<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Models\DetailAuditor;
use App\Models\Lembaga;
use App\Models\RuangLingkup;
use Illuminate\Http\Request;

class DetailAuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailAuditors = DetailAuditor::with([
            'auditor',
            'lembaga',
            'ruangLingkup'
        ])->get();

        return view('detail_auditor.index', compact('detailAuditors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auditors = Auditor::all();
        $lembagas = Lembaga::all();
        $ruangLingkups = RuangLingkup::all();

        return view('detail_auditor.create', compact(
            'auditors',
            'lembagas',
            'ruangLingkups'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'auditor_id' => 'required|exists:auditors,id',
            'lembaga_id' => 'required|exists:lembagas,id',
            'ruang_lingkup_id' => 'required|exists:ruang_lingkups,id',
        ]);

        DetailAuditor::create([
            'auditor_id' => $request->auditor_id,
            'lembaga_id' => $request->lembaga_id,
            'ruang_lingkup_id' => $request->ruang_lingkup_id,
        ]);

        return redirect()->route('detail-auditor.index')
            ->with('success', 'Data detail auditor berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailAuditor = DetailAuditor::with([
            'auditor',
            'lembaga',
            'ruangLingkup'
        ])->findOrFail($id);

        return view('detail_auditor.show', compact('detailAuditor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailAuditor = DetailAuditor::findOrFail($id);

        $auditors = Auditor::all();
        $lembagas = Lembaga::all();
        $ruangLingkups = RuangLingkup::all();

        return view('detail_auditor.edit', compact(
            'detailAuditor',
            'auditors',
            'lembagas',
            'ruangLingkups'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'auditor_id' => 'required|exists:auditors,id',
            'lembaga_id' => 'required|exists:lembagas,id',
            'ruang_lingkup_id' => 'required|exists:ruang_lingkups,id',
        ]);

        $detailAuditor = DetailAuditor::findOrFail($id);

        $detailAuditor->update([
            'auditor_id' => $request->auditor_id,
            'lembaga_id' => $request->lembaga_id,
            'ruang_lingkup_id' => $request->ruang_lingkup_id,
        ]);

        return redirect()->route('detail-auditor.index')
            ->with('success', 'Data detail auditor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailAuditor = DetailAuditor::findOrFail($id);

        $detailAuditor->delete();

        return redirect()->route('detail-auditor.index')
            ->with('success', 'Data detail auditor berhasil dihapus.');
    }
}