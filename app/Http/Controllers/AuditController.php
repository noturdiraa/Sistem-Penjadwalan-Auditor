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

        // Build mapping of unique company names to their records
        $companyMap = [];
        foreach ($perusahaans as $p) {
            $compName = trim($p->nama_perusahaan);
            $statusJasa = trim($p->status_jasa ?? '');

            // Find matching id_lembaga
            $idLembaga = null;
            if ($statusJasa) {
                $matchedLembaga = $lembagas->first(function ($l) use ($statusJasa) {
                    return strcasecmp(trim($l->nama_lembaga), $statusJasa) === 0;
                });
                if ($matchedLembaga) {
                    $idLembaga = $matchedLembaga->id_lembaga;
                }
            }

            if (!isset($companyMap[$compName])) {
                $companyMap[$compName] = [];
            }

            $companyMap[$compName][] = [
                'id_perusahaan' => $p->id_perusahaan,
                'status_jasa'   => $statusJasa ?: 'Lembaga Umum',
                'id_lembaga'    => $idLembaga,
            ];
        }

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

        return view('pji.kelola_audit.create', compact('perusahaans', 'companyMap', 'lembagas', 'dataRuangLingkup'));
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
            'keterangan' => $request->kategori_lokasi, // Store Kategori Wilayah in keterangan field
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
                // If no scopes requested, check if registered in any of selected lembagas
                $hasLembaga = $auditor->detailAuditors->contains(function($d) use ($selectedLembagaIds) {
                    return in_array($d->ruangLingkup->id_lembaga ?? null, $selectedLembagaIds);
                });
                if ($hasLembaga) {
                    $scoreKompetensi = 15;
                }
            }

            // 3. KETERSEDIAAN (Availability) - Max 25 Poin
            // Check overlaps in riwayat_auditors
            $overlapRiwayat = \App\Models\RiwayatAuditor::where('id_auditor', $auditor->id_auditor)
                ->where(function($q) use ($request) {
                    $q->where('tanggal_mulai', '<=', $request->tanggal_selesai)
                      ->where('tanggal_selesai', '>=', $request->tanggal_mulai);
                })->exists();

            // Check overlaps in active jadwal_audits
            $overlapJadwal = \App\Models\TimAudit::where('id_auditor', $auditor->id_auditor)
                ->whereHas('jadwalAudit', function($q) use ($request) {
                    $q->where('tanggal_mulai', '<=', $request->tanggal_selesai)
                      ->where('tanggal_selesai', '>=', $request->tanggal_mulai);
                })->exists();

            $scoreKetersediaan = ($overlapRiwayat || $overlapJadwal) ? 0 : 25;

            // 4. RIWAYAT AUDIT - Max 15 Poin
            $scoreRiwayat = 0;
            $hasHistory = \App\Models\RiwayatAuditor::where('id_auditor', $auditor->id_auditor)
                ->where('id_perusahaan', $perusahaan->id_perusahaan)
                ->exists();
            
            if ($hasHistory) {
                $scoreRiwayat = 15;
            }

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
                'total' => $totalScore
            ];
        }

        // Sort: Prioritize AMMI (highest Jabatan points), then fewer audits (lowest workload count), then total points
        $auditors = $auditors->sort(function ($a, $b) {
            if ($a->scoring['jabatan'] !== $b->scoring['jabatan']) {
                return $b->scoring['jabatan'] <=> $a->scoring['jabatan'];
            }
            
            $workloadA = $a->riwayatAuditors->count() + $a->timAudits->count();
            $workloadB = $b->riwayatAuditors->count() + $b->timAudits->count();
            if ($workloadA !== $workloadB) {
                return $workloadA <=> $workloadB;
            }
            
            return $b->scoring['total'] <=> $a->scoring['total'];
        });

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
