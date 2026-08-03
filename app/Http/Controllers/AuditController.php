<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $audits = \App\Models\Audit::with(['perusahaan', 'ruangLingkup.lembaga'])->get();
        return view('pji.kelola_audit.index', compact('audits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaans = \App\Models\Perusahaan::all();
        $lembagas = \App\Models\Lembaga::all();
        $ruangLingkups = \App\Models\RuangLingkup::with('lembaga')->get();

        // Build mapping of id_lembaga to array of ruang_lingkup names
        $dataRuangLingkup = [];
        foreach ($ruangLingkups as $rl) {
            if ($rl->lembaga) {
                $lId = $rl->lembaga->id_lembaga;
                if (!isset($dataRuangLingkup[$lId])) {
                    $dataRuangLingkup[$lId] = [];
                }
                $dataRuangLingkup[$lId][] = $rl->nama_ruang_lingkup;
            }
        }

        // Build mapping of company name to its address
        $companyAddresses = [];
        foreach ($perusahaans as $p) {
            $companyAddresses[trim($p->nama_perusahaan)] = $p->alamat ?? '';
        }

        return view('pji.kelola_audit.create', compact('perusahaans', 'lembagas', 'dataRuangLingkup', 'companyAddresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_perusahaan' => 'required|exists:perusahaans,id_perusahaan',
            'lokasi' => 'required|string|max:255',
            'kategori_lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'kompetensi_json' => 'required|string',
            'lead_auditor_id' => 'required|exists:auditors,id_auditor',
            'auditor_ids' => 'required|array',
            'auditor_ids.*' => 'exists:auditors,id_auditor',
            'keterangan' => 'nullable|string',
        ]);

        $kompetensiData = json_decode($request->kompetensi_json, true);

        if (!$kompetensiData || !is_array($kompetensiData)) {
            return back()->with('error', 'Data kompetensi/lembaga sertifikasi tidak valid.');
        }

        $lembagaNames = [];
        $idRuangLingkup = null;
        $allScopes = [];

        foreach ($kompetensiData as $lembagaId => $info) {
            $lembagaNames[] = $info['name'] ?? '-';
            $scopes = $info['scopes'] ?? [];
            foreach ($scopes as $sc) {
                $allScopes[] = $sc;
            }
            if (empty($idRuangLingkup)) {
                if (!empty($scopes)) {
                    $rl = \App\Models\RuangLingkup::where('nama_ruang_lingkup', $scopes[0])->first();
                    if ($rl) {
                        $idRuangLingkup = $rl->id_ruang_lingkup;
                    }
                }
            }
        }

        $jenisAuditStr = implode(', ', $lembagaNames) ?: '-';
        $ruangLingkupStr = implode('; ', $allScopes) ?: '-';

        // 1. Create Audit
        $audit = \App\Models\Audit::create([
            'id_perusahaan' => $request->id_perusahaan,
            'id_ruang_lingkup' => $idRuangLingkup,
            'ruang_lingkup' => $ruangLingkupStr,
            'tanggal_permohonan' => now()->format('Y-m-d'),
            'jenis_audit' => $jenisAuditStr,
            'status' => 'Review',
        ]);

        // 2. Create Lokasi
        $lokasi = \App\Models\Lokasi::create([
            'nama_lokasi' => $request->lokasi,
            'kategori_wilayah' => $request->kategori_lokasi,
            'keterangan' => null,
        ]);

        // 3. Create Jadwal Audit
        $jadwal = \App\Models\JadwalAudit::create([
            'id_audit' => $audit->id_audit,
            'id_lokasi' => $lokasi->id_lokasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status_jadwal' => 'Review',
            'keterangan' => $request->keterangan,
        ]);

        // 4. Create Tim Audit - Lead Auditor
        \App\Models\TimAudit::create([
            'id_jadwal' => $jadwal->id_jadwal,
            'id_auditor' => $request->lead_auditor_id,
            'peran' => 'Lead Auditor',
        ]);

        // 5. Create Tim Audit - Member Auditors
        foreach ($request->auditor_ids as $auditorId) {
            // Avoid duplicate Lead as Member
            if ($auditorId == $request->lead_auditor_id) continue;
            
            \App\Models\TimAudit::create([
                'id_jadwal' => $jadwal->id_jadwal,
                'id_auditor' => $auditorId,
                'peran' => 'Auditor',
            ]);
        }

        // 6. Save Recommendation Scores to rekomendasi_auditors table
        $selectedAuditorIds = array_merge(
            [$request->lead_auditor_id],
            $request->auditor_ids ?? []
        );

        $auditors = \App\Models\Auditor::with(['detailAuditors.ruangLingkup.lembaga', 'riwayatAuditors', 'timAudits.jadwalAudit'])
            ->whereIn('id_auditor', $selectedAuditorIds)
            ->get();

        foreach ($auditors as $auditor) {
            $workloadCount = $auditor->riwayatAuditors->count() + $auditor->timAudits->count();
            
            $scorePenugasan = 1;
            if ($workloadCount <= 2) {
                $scorePenugasan = 1;
            } elseif ($workloadCount <= 4) {
                $scorePenugasan = 2;
            } elseif ($workloadCount <= 6) {
                $scorePenugasan = 3;
            } else {
                $scorePenugasan = 4;
            }

            $currentKategori = trim($request->kategori_lokasi);
            $scoreKategori = 1;
            if ($currentKategori === 'Dalam Kota') {
                $scoreKategori = 1;
            } elseif ($currentKategori === 'Pinggiran Kota') {
                $scoreKategori = 2;
            } elseif ($currentKategori === 'Luar Kota') {
                $scoreKategori = 3;
            } elseif ($currentKategori === 'Luar Negeri') {
                $scoreKategori = 4;
            }

            // Gabungkan skala 2-8, lalu petakan/skalakan kembali ke 1-4 agar sesuai grafik kepala balai
            $totalScore = (int) ceil(($scorePenugasan + $scoreKategori) / 2);

            // Save to rekomendasi_auditors
            \App\Models\RekomendasiAuditor::create([
                'id_jadwal' => $jadwal->id_jadwal,
                'id_auditor' => $auditor->id_auditor,
                'nilai_rekomendasi' => $totalScore,
            ]);
        }

        return redirect()->route('pji.audit.index')->with('success', 'Jadwal audit dan tim audit berhasil dibuat.');
    }

    /**
     * Generate recommended audit team with scoring formula.
     */
    public function generate(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'kategori_lokasi' => 'required|string',
            'kompetensi_json' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $perusahaan = \App\Models\Perusahaan::where('nama_perusahaan', $request->nama_perusahaan)->first();
        if (!$perusahaan) {
            return back()->with('error', 'Perusahaan tidak ditemukan.');
        }

        $kompetensiData = json_decode($request->kompetensi_json, true);
        $requestedScopes = [];
        $selectedLembagaIds = [];
        
        if ($kompetensiData && is_array($kompetensiData)) {
            foreach ($kompetensiData as $lId => $info) {
                $selectedLembagaIds[] = $lId;
                if (!empty($info['scopes'])) {
                    $requestedScopes = array_merge($requestedScopes, $info['scopes']);
                }
            }
        }

        $auditors = \App\Models\Auditor::with(['detailAuditors.ruangLingkup.lembaga', 'riwayatAuditors', 'timAudits.jadwalAudit'])->get();

        // Ambil kategori lokasi audit
        $kategoriLokasi = trim($request->kategori_lokasi);

        // Filter: Hanya auditor yang memiliki kompetensi Lembaga & Ruang Lingkup yang sesuai
        $auditors = $auditors->filter(function($auditor) use ($selectedLembagaIds, $requestedScopes, $kategoriLokasi) {
            // Cek apakah auditor terdaftar di Lembaga terpilih
            $hasLembaga = $auditor->detailAuditors->contains(function($d) use ($selectedLembagaIds) {
                return in_array($d->ruangLingkup->id_lembaga ?? null, $selectedLembagaIds);
            });

            if (!$hasLembaga) {
                return false;
            }

            // Jika ada ruang lingkup yang dicari, pastikan auditor memiliki minimal salah satu ruang lingkup tersebut
            if (!empty($requestedScopes)) {
                $auditorScopes = $auditor->detailAuditors->map(fn($d) => trim($d->ruangLingkup->nama_ruang_lingkup ?? ''))->toArray();
                $hasAnyScope = false;
                foreach ($requestedScopes as $rScope) {
                    if (in_array(trim($rScope), $auditorScopes)) {
                        $hasAnyScope = true;
                        break;
                    }
                }
                if (!$hasAnyScope) {
                    return false;
                }
            }

            // Aturan Kertas: Jika kategori lokasi = Luar Negeri, hanya auditor AMMI yang boleh dipilih
            if ($kategoriLokasi === 'Luar Negeri') {
                return trim($auditor->posisi) === 'AMMI';
            }

            return true;
        });

        foreach ($auditors as $auditor) {
            // Check availability (overlap check)
            $overlapRiwayat = \App\Models\RiwayatAuditor::where('id_auditor', $auditor->id_auditor)
                ->where(function($q) use ($request) {
                    $q->where('tanggal_mulai', '<=', $request->tanggal_selesai)
                      ->where('tanggal_selesai', '>=', $request->tanggal_mulai);
                })->exists();

            $overlapJadwal = \App\Models\TimAudit::where('id_auditor', $auditor->id_auditor)
                ->whereHas('jadwalAudit', function($q) use ($request) {
                    $q->where('tanggal_mulai', '<=', $request->tanggal_selesai)
                      ->where('tanggal_selesai', '>=', $request->tanggal_mulai);
                })->exists();

            $workloadCount = $auditor->riwayatAuditors->count() + $auditor->timAudits->count();
            $auditor->workload_count = $workloadCount;
            
            $scorePenugasan = 1;
            if ($workloadCount <= 2) {
                $scorePenugasan = 1;
            } elseif ($workloadCount <= 4) {
                $scorePenugasan = 2;
            } elseif ($workloadCount <= 6) {
                $scorePenugasan = 3;
            } else {
                $scorePenugasan = 4;
            }

            $currentKategori = trim($request->kategori_lokasi);
            $scoreKategori = 1;
            if ($currentKategori === 'Dalam Kota') {
                $scoreKategori = 1;
            } elseif ($currentKategori === 'Pinggiran Kota') {
                $scoreKategori = 2;
            } elseif ($currentKategori === 'Luar Kota') {
                $scoreKategori = 3;
            } elseif ($currentKategori === 'Luar Negeri') {
                $scoreKategori = 4;
            }

            // Gabungkan skala 2-8, lalu petakan/skalakan kembali ke 1-4 agar sesuai grafik kepala balai
            $totalScore = (int) ceil(($scorePenugasan + $scoreKategori) / 2);

            $auditor->scoring = [
                'penugasan' => $scorePenugasan,
                'kategori' => $scoreKategori,
                'overlap_riwayat' => $overlapRiwayat,
                'overlap_jadwal' => $overlapJadwal,
                'ketersediaan_status' => ($overlapRiwayat || $overlapJadwal) ? 'Sibuk' : 'Tersedia',
                'total' => $totalScore
            ];
        }

        // Urutkan: Tersedia dulu, lalu Pegawai vs Subkontrak, lalu jumlah keberangkatan paling sedikit (poin 0 teratas), lalu jarak lokasi
        $auditors = $auditors->sort(function ($a, $b) {
            // 1. Ketersediaan (Tersedia dulu)
            $availA = $a->scoring['ketersediaan_status'] === 'Tersedia' ? 0 : 1;
            $availB = $b->scoring['ketersediaan_status'] === 'Tersedia' ? 0 : 1;
            if ($availA !== $availB) {
                return $availA <=> $availB;
            }

            // 2. Tipe Auditor (Pegawai didulukan dibanding Subkontrak/Subkon)
            $typeA = trim($a->jenis_auditor) === 'Pegawai' ? 0 : 1;
            $typeB = trim($b->jenis_auditor) === 'Pegawai' ? 0 : 1;
            if ($typeA !== $typeB) {
                return $typeA <=> $typeB;
            }

            // 3. Jumlah Keberangkatan (workload terkecil dulu)
            if ($a->workload_count !== $b->workload_count) {
                return $a->workload_count <=> $b->workload_count;
            }

            // 4. Jarak Lokasi
            return $a->scoring['kategori'] <=> $b->scoring['kategori'];
        });

        // Filter auditors based on position: Lead must be Lead Auditor
        $potentialLeads = $auditors->filter(fn($a) => trim($a->jabatan) === 'Lead Auditor')->values();
        
        // Select the top 1 Lead Auditor (first in sorted list)
        $leadAuditor = null;
        if ($potentialLeads->count() > 0) {
            $leadAuditor = $potentialLeads->first();
        } else {
            // Fallback if no Lead Auditor is found in the list of competent auditors
            $leadAuditor = $auditors->first();
        }

        // Selected Lead Auditor is excluded from the remaining list of potential members
        $potentialMembers = $auditors->filter(fn($a) => $a->id_auditor !== ($leadAuditor ? $leadAuditor->id_auditor : null))->values();
        
        // Select the top 2 members (available ones first)
        $selectedMembers = collect();
        $availableMembers = $potentialMembers->filter(fn($a) => $a->scoring['ketersediaan_status'] === 'Tersedia');
        if ($availableMembers->count() >= 2) {
            $selectedMembers = $availableMembers->take(2);
        } else {
            $selectedMembers = $potentialMembers->take(2);
        }

        // Combine: Lead at index 0, followed by the 2 members
        $finalAuditors = collect();
        if ($leadAuditor) {
            $finalAuditors->push($leadAuditor);
        }
        foreach ($selectedMembers as $m) {
            $finalAuditors->push($m);
        }

        $auditors = $finalAuditors;

        return view('pji.kelola_audit.generate', compact('auditors', 'request', 'perusahaan', 'requestedScopes'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $audit = \App\Models\Audit::findOrFail($id);

        // Delete related JadwalAudit, TimAudit, and Lokasi
        foreach ($audit->jadwalAudits as $jadwal) {
            $jadwal->timAudits()->delete();
            $jadwal->reviewKatimPjis()->delete();
            
            // Delete child AlasanPenolakan records first
            $reviewOpsIds = \App\Models\ReviewOperasional::where('id_jadwal', $jadwal->id_jadwal)->pluck('id_review_operasional');
            \App\Models\AlasanPenolakan::whereIn('id_review_operasional', $reviewOpsIds)->delete();
            
            $jadwal->reviewTeknis()->delete();
            $jadwal->riwayatAuditors()->delete();
            \App\Models\RekomendasiAuditor::where('id_jadwal', $jadwal->id_jadwal)->delete();
            $lokasi = $jadwal->lokasi;
            $jadwal->delete();
            
            if ($lokasi) {
                $lokasi->delete();
            }
        }

        $audit->riwayatAuditors()->delete();
        $audit->delete();

        return redirect()->route('pji.audit.index')->with('success', 'Data audit berhasil dihapus.');
    }

    public function rekapan(\Illuminate\Http\Request $request)
    {
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        $query = \App\Models\JadwalAudit::with(['audit.perusahaan', 'timAudits.auditor', 'lokasi'])
            ->where('status_jadwal', 'Selesai');

        if ($bulan !== 'all') {
            $query->whereMonth('tanggal_mulai', $bulan);
        }
        $query->whereYear('tanggal_mulai', $tahun);

        $jadwalAudits = $query->orderBy('tanggal_mulai', 'desc')->get();

        // Calculate total penugasan hari kerja
        $totalHari = 0;
        foreach ($jadwalAudits as $j) {
            if ($j->tanggal_mulai && $j->tanggal_selesai) {
                $start = \Carbon\Carbon::parse($j->tanggal_mulai);
                $end = \Carbon\Carbon::parse($j->tanggal_selesai);
                $totalHari += $start->diffInDays($end) + 1;
            }
        }

        return view('pji.rekapan_audit.index', compact('jadwalAudits', 'bulan', 'tahun', 'totalHari'));
    }
}
