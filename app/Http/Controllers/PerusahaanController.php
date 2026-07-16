<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaans = Perusahaan::all();
        return view('pji.kelola_perusahaan.index', compact('perusahaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pji.kelola_perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'status_jasa' => 'nullable|string|max:255',
            'ruang_lingkup' => 'nullable|string|max:255',
            'bidang_usaha' => 'nullable|string|max:255',
            'skala' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'alamat' => 'required|string',
        ]);

        Perusahaan::create($request->all());

        return redirect()->route('pji.perusahaan.index')
            ->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('pji.kelola_perusahaan.edit', compact('perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'status_jasa' => 'nullable|string|max:255',
            'ruang_lingkup' => 'nullable|string|max:255',
            'bidang_usaha' => 'nullable|string|max:255',
            'skala' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'alamat' => 'required|string',
        ]);

        $perusahaan->update($request->all());

        return redirect()->route('pji.perusahaan.index')
            ->with('success', 'Perusahaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        return redirect()->route('pji.perusahaan.index')
            ->with('success', 'Perusahaan berhasil dihapus.');
    }
}
