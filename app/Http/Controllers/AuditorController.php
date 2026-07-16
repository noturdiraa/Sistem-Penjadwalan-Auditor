<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use Illuminate\Http\Request;

class AuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditors = Auditor::all();

        return view('kepegawaian.kelola_auditor.index', compact('auditors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lembagas = \App\Models\Lembaga::with('ruangLingkups')->get();

        return view('kepegawaian.kelola_auditor.create', compact('lembagas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:auditors,nip',
            'jabatan' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $auditor = Auditor::create([
            'nama_auditor' => $request->nama,
            'nip' => $request->nip,
            'jenis_auditor' => $request->posisi == 'Subkon' ? 'Subkontrak' : 'Pegawai',
            'jabatan' => $request->jabatan,
            'posisi' => $request->posisi,
            'status' => $request->status,
        ]);

        $kompetensi_json = json_decode($request->kompetensi_lembaga, true);
        if ($kompetensi_json) {
            foreach ($kompetensi_json as $item) {
                $id_lembaga = $item['lembaga_id'];
                foreach ($item['ruang_lingkup'] as $nama_scope) {
                    $rl = \App\Models\RuangLingkup::where('id_lembaga', $id_lembaga)
                        ->where('nama_ruang_lingkup', $nama_scope)
                        ->first();
                    if ($rl) {
                        \App\Models\DetailAuditor::create([
                            'id_auditor' => $auditor->id_auditor,
                            'id_ruang_lingkup' => $rl->id_ruang_lingkup
                        ]);
                    }
                }
            }
        }

        return redirect()->route('kepegawaian.auditor.index')
            ->with('success', 'Data auditor berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $auditor = Auditor::findOrFail($id);

        return view('kepegawaian.kelola_auditor.show', compact('auditor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $auditor = Auditor::findOrFail($id);
        $lembagas = \App\Models\Lembaga::with('ruangLingkups')->get();

        return view('kepegawaian.kelola_auditor.edit', compact('auditor', 'lembagas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:auditors,nip,' . $id . ',id_auditor',
            'jabatan' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $auditor = Auditor::findOrFail($id);

        $auditor->update([
            'nama_auditor' => $request->nama,
            'nip' => $request->nip,
            'jenis_auditor' => $request->posisi == 'Subkon' ? 'Subkontrak' : 'Pegawai',
            'jabatan' => $request->jabatan,
            'posisi' => $request->posisi,
            'status' => $request->status,
        ]);

        \App\Models\DetailAuditor::where('id_auditor', $id)->delete();
        $kompetensi_json = json_decode($request->kompetensi_lembaga, true);
        if ($kompetensi_json) {
            foreach ($kompetensi_json as $item) {
                $id_lembaga = $item['lembaga_id'];
                foreach ($item['ruang_lingkup'] as $nama_scope) {
                    $rl = \App\Models\RuangLingkup::where('id_lembaga', $id_lembaga)
                        ->where('nama_ruang_lingkup', $nama_scope)
                        ->first();
                    if ($rl) {
                        \App\Models\DetailAuditor::create([
                            'id_auditor' => $id,
                            'id_ruang_lingkup' => $rl->id_ruang_lingkup
                        ]);
                    }
                }
            }
        }

        return redirect()->route('kepegawaian.auditor.index')
            ->with('success', 'Data auditor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \App\Models\DetailAuditor::where('id_auditor', $id)->delete();

        $auditor = Auditor::findOrFail($id);
        $auditor->delete();

        return redirect()->route('kepegawaian.auditor.index')
            ->with('success', 'Data auditor berhasil dihapus.');
    }
}