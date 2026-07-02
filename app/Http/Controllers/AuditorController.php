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

        return view('auditor.index', compact('auditors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auditor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_auditor' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:auditors,nip',
            'jabatan' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        Auditor::create([
            'nama_auditor' => $request->nama_auditor,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
        ]);

        return redirect()->route('auditor.index')
            ->with('success', 'Data auditor berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $auditor = Auditor::findOrFail($id);

        return view('auditor.show', compact('auditor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $auditor = Auditor::findOrFail($id);

        return view('auditor.edit', compact('auditor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_auditor' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:auditors,nip,' . $id,
            'jabatan' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $auditor = Auditor::findOrFail($id);

        $auditor->update([
            'nama_auditor' => $request->nama_auditor,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
        ]);

        return redirect()->route('auditor.index')
            ->with('success', 'Data auditor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auditor = Auditor::findOrFail($id);

        $auditor->delete();

        return redirect()->route('auditor.index')
            ->with('success', 'Data auditor berhasil dihapus.');
    }
}