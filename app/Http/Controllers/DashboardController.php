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
        
        // Mengambil 5 auditor teratas beserta relasi kompetensinya
        $auditors = Auditor::with('detailAuditors.ruangLingkup.lembaga')->take(5)->get();

        return view('dashboard.kepegawaian', compact(
            'totalAuditor',
            'auditorAktif',
            'totalLembaga',
            'totalRuangLingkup',
            'auditors'
        ));
    }

    public function admin()
    {
        $totalUsers = \App\Models\User::count();
        $usersPerRole = \App\Models\User::select('role', \DB::raw('count(*) as count'))
            ->groupBy('role')
            ->get();
        return view('dashboard.admin', compact('totalUsers', 'usersPerRole'));
    }
}
