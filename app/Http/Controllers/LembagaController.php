<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembagas = Lembaga::all();

        return view('kepegawaian.kelola_lembaga.index', compact('lembagas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kepegawaian.kelola_lembaga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Lembaga::create([
            'nama_lembaga' => $request->nama_lembaga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kepegawaian.lembaga.index')
            ->with('success', 'Data lembaga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lembaga = Lembaga::findOrFail($id);

        return view('kepegawaian.kelola_lembaga.show', compact('lembaga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lembaga = Lembaga::findOrFail($id);

        return view('kepegawaian.kelola_lembaga.edit', compact('lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $lembaga = Lembaga::findOrFail($id);

        $lembaga->update([
            'nama_lembaga' => $request->nama_lembaga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kepegawaian.lembaga.index')
            ->with('success', 'Data lembaga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lembaga = Lembaga::findOrFail($id);

        $lembaga->delete();

        return redirect()->route('kepegawaian.lembaga.index')
            ->with('success', 'Data lembaga berhasil dihapus.');
    }
}