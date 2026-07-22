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
        $firstLembagaName = '-';
        $idRuangLingkup = null;

        if ($kompetensiData && is_array($kompetensiData)) {
            foreach ($kompetensiData as $lembagaId => $info) {
                $firstLembagaName = $info['name'] ?? '-';
                $scopes = $info['scopes'] ?? [];
                if (!empty($scopes)) {
                    $rl = \App\Models\RuangLingkup::where('nama_ruang_lingkup', $scopes[0])->first();
                    if ($rl) {
                        $idRuangLingkup = $rl->id_ruang_lingkup;
                    }
                }
                break;
            }
        }

        // 1. Create Audit
        $audit = \App\Models\Audit::create([
            'id_perusahaan' => $request->id_perusahaan,
            'id_ruang_lingkup' => $idRuangLingkup,
            'tanggal_permohonan' => now()->format('Y-m-d'),
            'jenis_audit' => $firstLembagaName,
            'status' => 'Menunggu',
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
            'status_jadwal' => 'Menunggu',
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

        foreach ($auditors as $auditor) {
            // 1. JABATAN (Posisi) - Max 15 Poin
            $scoreJabatan = 5;
            if ($auditor->posisi === 'AMMI') {
                $scoreJabatan = 15;
            } elseif ($auditor->posisi === 'Non AMMI') {
                $scoreJabatan = 10;
            }

            // 2. KOMPETENSI (Lembaga & Ruang Lingkup) - Max 35 Poin
            $scoreKompetensi = 0;
            $auditorScopes = $auditor->detailAuditors->map(fn($d) => trim($d->ruangLingkup->nama_ruang_lingkup ?? ''))->toArray();
            
            if (!empty($requestedScopes)) {
                $matchCount = 0;
                foreach ($requestedScopes as $rScope) {
                    if (in_array(trim($rScope), $auditorScopes)) {
                        $matchCount++;
                    }
                }
                
                $totalRequested = count($requestedScopes);
                if ($matchCount == $totalRequested) {
                    $scoreKompetensi = 35;
                } elseif ($matchCount > 0) {
                    $scoreKompetensi = 20;
                }
            } else {
                $hasLembaga = $auditor->detailAuditors->contains(function($d) use ($selectedLembagaIds) {
                    return in_array($d->ruangLingkup->id_lembaga ?? null, $selectedLembagaIds);
                });
                if ($hasLembaga) {
                    $scoreKompetensi = 15;
                }
            }

            // 3. KETERSEDIAAN (Availability) - Max 25 Poin
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

            $scoreKetersediaan = ($overlapRiwayat || $overlapJadwal) ? 0 : 25;

            // 4. RIWAYAT AUDIT - Max 15 Poin
            $hasAuditedBefore = \App\Models\TimAudit::where('id_auditor', $auditor->id_auditor)
                ->whereHas('jadwalAudit.audit', function($q) use ($request) {
                    $q->where('id_perusahaan', $request->id_perusahaan);
                })->exists();
            $scoreRiwayat = $hasAuditedBefore ? 15 : 0;

            // 5. BEBAN KERJA (Workload) - Max 10 Poin
            $workloadCount = $auditor->riwayatAuditors->count() + $auditor->timAudits->count();
            $scoreBeban = 0;
            if ($workloadCount <= 2) {
                $scoreBeban = 10;
            } elseif ($workloadCount <= 4) {
                $scoreBeban = 5;
            }

            $totalScore = $scoreJabatan + $scoreKompetensi + $scoreKetersediaan + $scoreRiwayat + $scoreBeban;

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

        // Filter: Hanya auditor yang memiliki kompetensi Lembaga & Ruang Lingkup yang sesuai
        $auditors = $auditors->filter(function($auditor) use ($selectedLembagaIds, $requestedScopes) {
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
                return $hasAnyScope;
            }

            return true;
        });

        foreach ($auditors as $auditor) {
            // 1. JABATAN (Posisi) - Max 15 Poin
            $scoreJabatan = 5;
            if ($auditor->posisi === 'AMMI') {
                $scoreJabatan = 15;
            } elseif ($auditor->posisi === 'Non AMMI') {
                $scoreJabatan = 10;
            }

            // 2. KOMPETENSI (Lembaga & Ruang Lingkup) - Max 35 Poin
            $scoreKompetensi = 0;
            $auditorScopes = $auditor->detailAuditors->map(fn($d) => trim($d->ruangLingkup->nama_ruang_lingkup ?? ''))->toArray();
            
            if (!empty($requestedScopes)) {
                $matchCount = 0;
                foreach ($requestedScopes as $rScope) {
                    if (in_array(trim($rScope), $auditorScopes)) {
                        $matchCount++;
                    }
                }
                
                $totalRequested = count($requestedScopes);
                if ($matchCount == $totalRequested) {
                    $scoreKompetensi = 35;
                } elseif ($matchCount > 0) {
                    $scoreKompetensi = 20;
                }
            } else {
                $hasLembaga = $auditor->detailAuditors->contains(function($d) use ($selectedLembagaIds) {
                    return in_array($d->ruangLingkup->id_lembaga ?? null, $selectedLembagaIds);
                });
                if ($hasLembaga) {
                    $scoreKompetensi = 15;
                }
            }

            // 3. KETERSEDIAAN (Availability) - Max 25 Poin
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

            $scoreKetersediaan = ($overlapRiwayat || $overlapJadwal) ? 0 : 25;

            // 4. RIWAYAT AUDIT - Max 15 Poin
            $hasHistory = \App\Models\TimAudit::where('id_auditor', $auditor->id_auditor)
                ->whereHas('jadwalAudit.audit', function($q) use ($perusahaan) {
                    $q->where('id_perusahaan', $perusahaan->id_perusahaan);
                })->exists();
            $scoreRiwayat = $hasHistory ? 15 : 0;

            // 5. BEBAN KERJA (Workload) - Max 10 Poin
            $workloadCount = $auditor->riwayatAuditors->count() + $auditor->timAudits->count();
            $scoreBeban = 0;
            if ($workloadCount <= 2) {
                $scoreBeban = 10;
            } elseif ($workloadCount <= 4) {
                $scoreBeban = 5;
            }

            $totalScore = $scoreJabatan + $scoreKompetensi + $scoreKetersediaan + $scoreRiwayat + $scoreBeban;

            $auditor->scoring = [
                'jabatan' => $scoreJabatan,
                'kompetensi' => $scoreKompetensi,
                'ketersediaan' => $scoreKetersediaan,
                'riwayat' => $scoreRiwayat,
                'beban' => $scoreBeban,
                'overlap_riwayat' => $overlapRiwayat,
                'overlap_jadwal' => $overlapJadwal,
                'ketersediaan_status' => ($overlapRiwayat || $overlapJadwal) ? 'Sibuk' : 'Tersedia',
                'total' => $totalScore
            ];
        }

        // Sort by total score descending (highest points first)
        $auditors = $auditors->sortByDesc(fn($a) => $a->scoring['total']);

        // Prioritize available auditors and take exactly 3
        $availableAuditors = $auditors->filter(fn($a) => $a->scoring['ketersediaan_status'] === 'Tersedia');
        if ($availableAuditors->count() >= 3) {
            $auditors = $availableAuditors->take(3)->values();
        } else {
            $auditors = $auditors->take(3)->values();
        }

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
            $jadwal->reviewTeknis()->delete();
            $jadwal->riwayatAuditors()->delete();
            
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
}
