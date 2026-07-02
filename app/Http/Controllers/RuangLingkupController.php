<?php

namespace App\Http\Controllers;

use App\Models\RuangLingkup;
use App\Models\Lembaga;
use Illuminate\Http\Request;

class RuangLingkupController extends Controller
{
    public function index()
    {
        $ruangLingkups = RuangLingkup::with('lembaga')->get();

        return view('ruang_lingkup.index', compact('ruangLingkups'));
    }

    public function create()
    {
        $lembagas = Lembaga::all();

        return view('ruang_lingkup.create', compact('lembagas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lembaga_id' => 'required|exists:lembagas,id',
            'nama_ruang_lingkup' => 'required|string|max:255',
        ]);

        RuangLingkup::create([
            'lembaga_id' => $request->lembaga_id,
            'nama_ruang_lingkup' => $request->nama_ruang_lingkup,
        ]);

        return redirect()->route('ruang-lingkup.index')
            ->with('success', 'Data ruang lingkup berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $ruangLingkup = RuangLingkup::findOrFail($id);

        return view('ruang_lingkup.show', compact('ruangLingkup'));
    }

    public function edit(string $id)
    {
        $ruangLingkup = RuangLingkup::findOrFail($id);
        $lembagas = Lembaga::all();

        return view('ruang_lingkup.edit', compact('ruangLingkup', 'lembagas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'lembaga_id' => 'required|exists:lembagas,id',
            'nama_ruang_lingkup' => 'required|string|max:255',
        ]);

        $ruangLingkup = RuangLingkup::findOrFail($id);

        $ruangLingkup->update([
            'lembaga_id' => $request->lembaga_id,
            'nama_ruang_lingkup' => $request->nama_ruang_lingkup,
        ]);

        return redirect()->route('ruang-lingkup.index')
            ->with('success', 'Data ruang lingkup berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $ruangLingkup = RuangLingkup::findOrFail($id);

        $ruangLingkup->delete();

        return redirect()->route('ruang-lingkup.index')
            ->with('success', 'Data ruang lingkup berhasil dihapus.');
    }
}