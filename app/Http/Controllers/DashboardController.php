<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Models\Lembaga;
use App\Models\RuangLingkup;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function kepegawaian()
    {
        $totalAuditor = Auditor::count();
        $auditorAktif = Auditor::where('status', 'Aktif')->count();
        $totalLembaga = Lembaga::count();
        $totalRuangLingkup = RuangLingkup::count();
        
        // Mengambil semua auditor beserta relasi kompetensinya
        $auditors = Auditor::with('detailAuditors.ruangLingkup.lembaga')->get();

        return view('dashboard.kepegawaian', compact(
            'totalAuditor',
            'auditorAktif',
            'totalLembaga',
            'totalRuangLingkup',
            'auditors'
        ));
    }
}
