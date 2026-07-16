<?php

namespace App\Http\Controllers;

use App\Models\RiwayatAuditor;
use App\Models\Auditor;
use App\Models\Audit;
use App\Models\JadwalAudit;
use Illuminate\Http\Request;

class RiwayatAuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayats = RiwayatAuditor::with(['auditor', 'audit.perusahaan', 'jadwalAudit.lokasi'])->get();

        return view('kepegawaian.data_riwayat_auditor.index', compact('riwayats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auditors = Auditor::all();
        $perusahaans = \App\Models\Perusahaan::all();
        $lembagas = \App\Models\Lembaga::all();

        return view('kepegawaian.data_riwayat_auditor.create', compact('auditors', 'perusahaans', 'lembagas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Find or create ruang lingkup
        $ruang_lingkup = \App\Models\RuangLingkup::where('id_lembaga', $request->id_lembaga)->first();
        if (!$ruang_lingkup) {
            $ruang_lingkup = \App\Models\RuangLingkup::first();
        }
        $id_ruang_lingkup = $ruang_lingkup ? $ruang_lingkup->id_ruang_lingkup : 1;

        // 2. Find or create Audit
        $audit = Audit::firstOrCreate([
            'id_perusahaan' => $request->id_perusahaan,
            'id_ruang_lingkup' => $id_ruang_lingkup,
            'jenis_audit' => $request->jenis_audit,
        ]);

        // 3. Find or create Lokasi
        $lokasi = \App\Models\Lokasi::first();
        if (!$lokasi) {
            $lokasi = \App\Models\Lokasi::create([
                'nama_lokasi' => 'Palembang',
                'kategori_wilayah' => 'Wilayah I'
            ]);
        }
        $id_lokasi = $lokasi->id_lokasi;

        // 4. Find or create JadwalAudit
        $jadwal = JadwalAudit::firstOrCreate([
            'id_audit' => $audit->id_audit,
            'id_lokasi' => $id_lokasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai ?? $request->tanggal_mulai,
        ], [
            'status_jadwal' => 'Disetujui',
        ]);

        // Inject them into request
        $request->merge([
            'id_audit' => $audit->id_audit,
            'id_jadwal' => $jadwal->id_jadwal,
        ]);

        // Validate
        $request->validate([
            'id_auditor' => 'required|exists:auditors,id_auditor',
            'id_audit' => 'required|exists:audits,id_audit',
            'id_jadwal' => 'required|exists:jadwal_audits,id_jadwal',
            'peran_auditor' => 'required|in:Lead Auditor,Auditor',
            'status_penugasan' => 'required|in:Berlangsung,Selesai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string',
        ]);

        RiwayatAuditor::create($request->all());

        // Manage tim_audits relations
        \App\Models\TimAudit::where('id_jadwal', $jadwal->id_jadwal)->delete();
        \App\Models\TimAudit::create([
            'id_jadwal' => $jadwal->id_jadwal,
            'id_auditor' => $request->id_auditor,
            'peran' => $request->peran_auditor,
        ]);

        if ($request->has('tim_audit')) {
            foreach ($request->tim_audit as $other_auditor_id) {
                if ($other_auditor_id != $request->id_auditor) {
                    \App\Models\TimAudit::firstOrCreate([
                        'id_jadwal' => $jadwal->id_jadwal,
                        'id_auditor' => $other_auditor_id,
                        'peran' => 'Auditor',
                    ]);
                }
            }
        }

        return redirect()->route('kepegawaian.riwayatauditor.index')
            ->with('success', 'Riwayat auditor berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $riwayat = RiwayatAuditor::with(['audit.ruangLingkup.lembaga', 'jadwalAudit.timAudits'])->findOrFail($id);
        $auditors = Auditor::all();
        $perusahaans = \App\Models\Perusahaan::all();
        $lembagas = \App\Models\Lembaga::all();

        return view('kepegawaian.data_riwayat_auditor.edit', compact('riwayat', 'auditors', 'perusahaans', 'lembagas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $riwayat = RiwayatAuditor::findOrFail($id);

        // 1. Find or create ruang lingkup
        $ruang_lingkup = \App\Models\RuangLingkup::where('id_lembaga', $request->id_lembaga)->first();
        if (!$ruang_lingkup) {
            $ruang_lingkup = \App\Models\RuangLingkup::first();
        }
        $id_ruang_lingkup = $ruang_lingkup ? $ruang_lingkup->id_ruang_lingkup : 1;

        // 2. Find or create Audit
        $audit = Audit::firstOrCreate([
            'id_perusahaan' => $request->id_perusahaan,
            'id_ruang_lingkup' => $id_ruang_lingkup,
            'jenis_audit' => $request->jenis_audit,
        ]);

        // 3. Find or create Lokasi
        $lokasi = \App\Models\Lokasi::first();
        if (!$lokasi) {
            $lokasi = \App\Models\Lokasi::create([
                'nama_lokasi' => 'Palembang',
                'kategori_wilayah' => 'Wilayah I'
            ]);
        }
        $id_lokasi = $lokasi->id_lokasi;

        // 4. Find or create JadwalAudit
        $jadwal = JadwalAudit::firstOrCreate([
            'id_audit' => $audit->id_audit,
            'id_lokasi' => $id_lokasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai ?? $request->tanggal_mulai,
        ], [
            'status_jadwal' => 'Disetujui',
        ]);

        // Inject
        $request->merge([
            'id_audit' => $audit->id_audit,
            'id_jadwal' => $jadwal->id_jadwal,
        ]);

        $request->validate([
            'id_auditor' => 'required|exists:auditors,id_auditor',
            'id_audit' => 'required|exists:audits,id_audit',
            'id_jadwal' => 'required|exists:jadwal_audits,id_jadwal',
            'peran_auditor' => 'required|in:Lead Auditor,Auditor',
            'status_penugasan' => 'required|in:Berlangsung,Selesai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string',
        ]);

        $riwayat->update($request->all());

        // Manage tim_audits relations
        \App\Models\TimAudit::where('id_jadwal', $jadwal->id_jadwal)->delete();
        \App\Models\TimAudit::create([
            'id_jadwal' => $jadwal->id_jadwal,
            'id_auditor' => $request->id_auditor,
            'peran' => $request->peran_auditor,
        ]);

        if ($request->has('tim_audit')) {
            foreach ($request->tim_audit as $other_auditor_id) {
                if ($other_auditor_id != $request->id_auditor) {
                    \App\Models\TimAudit::firstOrCreate([
                        'id_jadwal' => $jadwal->id_jadwal,
                        'id_auditor' => $other_auditor_id,
                        'peran' => 'Auditor',
                    ]);
                }
            }
        }

        return redirect()->route('kepegawaian.riwayatauditor.index')
            ->with('success', 'Riwayat auditor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $riwayat = RiwayatAuditor::findOrFail($id);
        $riwayat->delete();

        return redirect()->route('kepegawaian.riwayatauditor.index')
            ->with('success', 'Riwayat auditor berhasil dihapus.');
    }
}
