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
        $audits = Audit::with('perusahaan')->get();
        $jadwals = JadwalAudit::with(['audit.perusahaan', 'lokasi'])->get();

        return view('kepegawaian.data_riwayat_auditor.create', compact('auditors', 'audits', 'jadwals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_auditor' => 'required|exists:auditors,id_auditor',
            'id_audit' => 'required|exists:audits,id_audit',
            'id_jadwal' => 'required|exists:jadwal_audits,id_jadwal',
            'peran_auditor' => 'required|in:Lead Auditor,Auditor',
            'status_penugasan' => 'required|in:Berlangsung,Selesai,Dibatalkan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string',
        ]);

        RiwayatAuditor::create($request->all());

        return redirect()->route('kepegawaian.riwayatauditor.index')
            ->with('success', 'Riwayat auditor berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $riwayat = RiwayatAuditor::findOrFail($id);
        $auditors = Auditor::all();
        $audits = Audit::with('perusahaan')->get();
        $jadwals = JadwalAudit::with(['audit.perusahaan', 'lokasi'])->get();

        return view('kepegawaian.data_riwayat_auditor.edit', compact('riwayat', 'auditors', 'audits', 'jadwals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $riwayat = RiwayatAuditor::findOrFail($id);

        $request->validate([
            'id_auditor' => 'required|exists:auditors,id_auditor',
            'id_audit' => 'required|exists:audits,id_audit',
            'id_jadwal' => 'required|exists:jadwal_audits,id_jadwal',
            'peran_auditor' => 'required|in:Lead Auditor,Auditor',
            'status_penugasan' => 'required|in:Berlangsung,Selesai,Dibatalkan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string',
        ]);

        $riwayat->update($request->all());

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
