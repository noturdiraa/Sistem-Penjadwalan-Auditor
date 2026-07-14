<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// ================= LOGIN & AUTHENTICATION =================

// Halaman utama: jika sudah login arahkan ke dashboard masing-masing, jika belum arahkan ke login
Route::get('/', function () {
    if (auth()->check()) {
        $role = strtolower(auth()->user()->role);
        if ($role === 'kepegawaian') {
            return redirect()->route('dashboard.kepegawaian');
        } elseif ($role === 'pji') {
            return redirect()->route('dashboard.pji');
        } elseif ($role === 'kepala balai') {
            return redirect()->route('dashboard.kepala_balai');
        } elseif ($role === 'operasional') {
            return redirect()->route('dashboard.operasional');
        }
    }
    return redirect()->route('login');
});

// Pengalihan jika Laravel mengarahkan user terautentikasi ke /home secara default
Route::redirect('/home', '/');

// Hanya bisa diakses oleh Guest (user yang belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Logout (Hanya untuk user yang sudah login)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ================= GROUP ROUTE TERPROTEKSI LOGIN =================
Route::middleware(['auth'])->group(function () {

    // ================= 1. ROLE: KEPEGAWAIAN =================
    Route::middleware(['role:kepegawaian'])->group(function () {
        Route::view('/dashboard-kepegawaian', 'dashboard.kepegawaian')->name('dashboard.kepegawaian');

        Route::view('/kepegawaian/auditor', 'kepegawaian.kelola_auditor.index')->name('kepegawaian.auditor.index');
        Route::view('/kepegawaian/auditor/create', 'kepegawaian.kelola_auditor.create')->name('kepegawaian.auditor.create');
        Route::view('/kepegawaian/auditor/edit', 'kepegawaian.kelola_auditor.edit')->name('kepegawaian.auditor.edit');

        Route::view('/kepegawaian/lembaga', 'kepegawaian.kelola_lembaga.index')->name('kepegawaian.lembaga.index');
        Route::view('/kepegawaian/ruang-lingkup', 'kepegawaian.kelola_ruang_lingkup.index')->name('kepegawaian.ruanglinkup.index');

        Route::view('/kepegawaian/profil', 'kepegawaian.profil.index')->name('kepegawaian.profil.index');
        Route::view('/kepegawaian/profil/edit', 'kepegawaian.profil.edit')->name('kepegawaian.profil.edit');
    });

    // ================= 2. ROLE: PJI =================
    Route::middleware(['role:pji'])->group(function () {
        Route::view('/dashboard-pji', 'dashboard.pji')->name('dashboard.pji');

        Route::view('/pji/perusahaan', 'pji.kelola_perusahaan.index')->name('pji.perusahaan.index');
        Route::view('/pji/perusahaan/create', 'pji.kelola_perusahaan.create')->name('pji.perusahaan.create');
        Route::view('/pji/perusahaan/edit', 'pji.kelola_perusahaan.edit')->name('pji.perusahaan.edit');

        Route::view('/pji/audit', 'pji.kelola_audit.index')->name('pji.audit.index');
        Route::view('/pji/audit/create', 'pji.kelola_audit.create')->name('pji.audit.create');
        Route::view('/pji/audit/edit', 'pji.kelola_audit.edit')->name('pji.audit.edit');
        Route::view('/pji/audit/generate', 'pji.kelola_audit.generate')->name('pji.audit.generate');

        Route::view('/pji/tim-audit', 'pji.tim_audit.index')->name('pji.timaudit.index');
        Route::view('/pji/review-katim', 'pji.review_katim_pji.index')->name('pji.reviewkatim.index');
        Route::view('/pji/review-katim/review', 'pji.review_katim_pji.review')->name('pji.reviewkatim.review');

        Route::view('/pji/profil', 'pji.profil.index')->name('pji.profil.index');
        Route::view('/pji/profil/edit', 'pji.profil.edit')->name('pji.profil.edit');
    });

    // ================= 3. ROLE: OPERASIONAL =================
    Route::middleware(['role:operasional'])->group(function () {
        Route::view('/dashboard-operasional', 'dashboard.operasional')->name('dashboard.operasional');

        Route::view('/operasional/review-jadwal', 'operasional.review_jadwal_audit.index')->name('operasional.reviewjadwal.index');
        Route::view('/operasional/review-jadwal/review', 'operasional.review_jadwal_audit.review')->name('operasional.reviewjadwal.review');

        Route::view('/operasional/input-auditor', 'operasional.input_auditor_manual.index')->name('operasional.inputauditor.index');
        Route::view('/operasional/input-auditor/create', 'operasional.input_auditor_manual.create')->name('operasional.inputauditor.create');
        Route::view('/operasional/input-auditor/edit', 'operasional.input_auditor_manual.edit')->name('operasional.inputauditor.edit');

        Route::view('/operasional/riwayat-review', 'operasional.riwayat_review.index')->name('operasional.riwayatreview.index');
        Route::view('/operasional/profil', 'operasional.profil.index')->name('operasional.profil.index');
    });

    // ================= 4. ROLE: KEPALA BALAI =================
    Route::middleware(['role:kepala balai'])->group(function () {
        Route::view('/dashboard-kepala-balai', 'dashboard.kepala_balai')->name('dashboard.kepala_balai');

        Route::view('/kepalabalai/approval-jadwal', 'kepalabalai.approval_jadwal.index')->name('kepalabalai.approval.index');
        Route::view('/kepalabalai/approval-jadwal/detail', 'kepalabalai.approval_jadwal.detail')->name('kepalabalai.approval.detail');
        Route::view('/kepalabalai/approval-jadwal/approval', 'kepalabalai.approval_jadwal.approval')->name('kepalabalai.approval.approve');

        Route::view('/kepalabalai/grafik-beban-kerja', 'kepalabalai.garfik_beban_kerja.index')->name('kepalabalai.grafik.index');
        Route::view('/kepalabalai/kalender-audit', 'kepalabalai.kalender_audit.index')->name('kepalabalai.kalender.index');
        Route::view('/kepalabalai/monitoring', 'kepalabalai.monitoring.index')->name('kepalabalai.monitoring.index');
        Route::view('/kepalabalai/monitoring/detail', 'kepalabalai.monitoring.detail')->name('kepalabalai.monitoring.detail');
        Route::view('/kepalabalai/profil', 'kepalabalai.profil.index')->name('kepalabalai.profil.index');
    });

});