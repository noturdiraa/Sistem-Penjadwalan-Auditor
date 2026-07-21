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
        $riwayats = RiwayatAuditor::with([
            'auditor', 
            'perusahaan', 
            'lembaga', 
            'audit.perusahaan', 
            'audit.ruangLingkup.lembaga', 
            'jadwalAudit.timAudits.auditor'
        ])->get();

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
        $jenisAudits = Audit::select('jenis_audit')->distinct()->pluck('jenis_audit');

        return view('kepegawaian.data_riwayat_auditor.create', compact('auditors', 'perusahaans', 'lembagas', 'jenisAudits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_auditor' => 'required|exists:auditors,id_auditor',
            'id_perusahaan' => 'required|exists:perusahaans,id_perusahaan',
            'id_lembaga' => 'required|exists:lembagas,id_lembaga',
            'jenis_audit' => 'required|string|max:255',
            'peran_auditor' => 'required|in:Lead Auditor,Auditor',
            'status_penugasan' => 'required|in:Berlangsung,Selesai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string',
        ]);

        $otherTeamStr = null;
        if ($request->has('tim_audit') && is_array($request->tim_audit)) {
            $otherAuditors = Auditor::whereIn('id_auditor', $request->tim_audit)
                ->where('id_auditor', '!=', $request->id_auditor)
                ->get();
            $names = [];
            foreach ($otherAuditors as $oa) {
                $names[] = $oa->nama_auditor . ' (NIP: ' . ($oa->nip ?: '-') . ')';
            }
            if (count($names) > 0) {
                $otherTeamStr = implode(' | ', $names);
            }
        }

        RiwayatAuditor::create([
            'id_auditor' => $request->id_auditor,
            'id_perusahaan' => $request->id_perusahaan,
            'id_lembaga' => $request->id_lembaga,
            'jenis_audit' => $request->jenis_audit,
            'tim_audit_lainnya' => $otherTeamStr,
            'peran_auditor' => $request->peran_auditor,
            'status_penugasan' => $request->status_penugasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kepegawaian.riwayatauditor.index')
            ->with('success', 'Riwayat auditor berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $riwayat = RiwayatAuditor::with(['perusahaan', 'lembaga', 'audit.ruangLingkup.lembaga', 'jadwalAudit.timAudits'])->findOrFail($id);
        $auditors = Auditor::all();
        $perusahaans = \App\Models\Perusahaan::all();
        $lembagas = \App\Models\Lembaga::all();
        $jenisAudits = Audit::select('jenis_audit')->distinct()->pluck('jenis_audit');

        return view('kepegawaian.data_riwayat_auditor.edit', compact('riwayat', 'auditors', 'perusahaans', 'lembagas', 'jenisAudits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $riwayat = RiwayatAuditor::findOrFail($id);

        $request->validate([
            'id_auditor' => 'required|exists:auditors,id_auditor',
            'id_perusahaan' => 'required|exists:perusahaans,id_perusahaan',
            'id_lembaga' => 'required|exists:lembagas,id_lembaga',
            'jenis_audit' => 'required|string|max:255',
            'peran_auditor' => 'required|in:Lead Auditor,Auditor',
            'status_penugasan' => 'required|in:Berlangsung,Selesai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string',
        ]);

        $otherTeamStr = null;
        if ($request->has('tim_audit') && is_array($request->tim_audit)) {
            $otherAuditors = Auditor::whereIn('id_auditor', $request->tim_audit)
                ->where('id_auditor', '!=', $request->id_auditor)
                ->get();
            $names = [];
            foreach ($otherAuditors as $oa) {
                $names[] = $oa->nama_auditor . ' (NIP: ' . ($oa->nip ?: '-') . ')';
            }
            if (count($names) > 0) {
                $otherTeamStr = implode(' | ', $names);
            }
        }

        $riwayat->update([
            'id_auditor' => $request->id_auditor,
            'id_perusahaan' => $request->id_perusahaan,
            'id_lembaga' => $request->id_lembaga,
            'jenis_audit' => $request->jenis_audit,
            'tim_audit_lainnya' => $otherTeamStr,
            'peran_auditor' => $request->peran_auditor,
            'status_penugasan' => $request->status_penugasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan,
        ]);

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
