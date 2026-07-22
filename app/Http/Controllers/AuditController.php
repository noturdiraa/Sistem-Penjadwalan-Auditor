<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $audits = \App\Models\Audit::with(['perusahaan', 'ruangLingkup.lembaga'])->get();
        return view('pji.kelola_audit.index', compact('audits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaans = \App\Models\Perusahaan::all();
        $lembagas = \App\Models\Lembaga::all();
        $ruangLingkups = \App\Models\RuangLingkup::with('lembaga')->get();

        // Build mapping of unique company names to their records
        $companyMap = [];
        foreach ($perusahaans as $p) {
            $compName = trim($p->nama_perusahaan);
            $statusJasa = trim($p->status_jasa ?? '');

            // Find matching id_lembaga
            $idLembaga = null;
            if ($statusJasa) {
                $matchedLembaga = $lembagas->first(function ($l) use ($statusJasa) {
                    return strcasecmp(trim($l->nama_lembaga), $statusJasa) === 0;
                });
                if ($matchedLembaga) {
                    $idLembaga = $matchedLembaga->id_lembaga;
                }
            }

            if (!isset($companyMap[$compName])) {
                $companyMap[$compName] = [];
            }

            $companyMap[$compName][] = [
                'id_perusahaan' => $p->id_perusahaan,
                'status_jasa'   => $statusJasa ?: 'Lembaga Umum',
                'id_lembaga'    => $idLembaga,
            ];
        }

        // Build mapping of id_lembaga to array of ruang_lingkup names
        $dataRuangLingkup = [];
        foreach ($ruangLingkups as $rl) {
            if ($rl->lembaga) {
                $lId = $rl->lembaga->id_lembaga;
                if (!isset($dataRuangLingkup[$lId])) {
                    $dataRuangLingkup[$lId] = [];
                }
                $dataRuangLingkup[$lId][] = $rl->nama_ruang_lingkup;
            }
        }

        return view('pji.kelola_audit.create', compact('perusahaans', 'companyMap', 'lembagas', 'dataRuangLingkup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
