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
        $lembagas = Lembaga::all();

        return view('kepegawaian.kelola_ruang_lingkup.index', compact('ruangLingkups', 'lembagas'));
    }

    public function create()
    {
        $lembagas = Lembaga::all();

        return view('kepegawaian.kelola_ruang_lingkup.create', compact('lembagas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lembaga' => 'required|exists:lembagas,id_lembaga',
            'nama_ruang_lingkup' => 'required|string|max:255',
        ]);

        RuangLingkup::create([
            'id_lembaga' => $request->id_lembaga,
            'nama_ruang_lingkup' => $request->nama_ruang_lingkup,
        ]);

        return redirect()->route('kepegawaian.ruanglinkup.index')
            ->with('success', 'Data ruang lingkup berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $ruangLingkup = RuangLingkup::findOrFail($id);

        return view('kepegawaian.kelola_ruang_lingkup.show', compact('ruangLingkup'));
    }

    public function edit(string $id)
    {
        $ruangLingkup = RuangLingkup::findOrFail($id);
        $lembagas = Lembaga::all();

        return view('kepegawaian.kelola_ruang_lingkup.edit', compact('ruangLingkup', 'lembagas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_lembaga' => 'required|exists:lembagas,id_lembaga',
            'nama_ruang_lingkup' => 'required|string|max:255',
        ]);

        $ruangLingkup = RuangLingkup::findOrFail($id);

        $ruangLingkup->update([
            'id_lembaga' => $request->id_lembaga,
            'nama_ruang_lingkup' => $request->nama_ruang_lingkup,
        ]);

        return redirect()->route('kepegawaian.ruanglinkup.index')
            ->with('success', 'Data ruang lingkup berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $ruangLingkup = RuangLingkup::findOrFail($id);

        $ruangLingkup->delete();

        return redirect()->route('kepegawaian.ruanglinkup.index')
            ->with('success', 'Data ruang lingkup berhasil dihapus.');
    }
}