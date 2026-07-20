<?php

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
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
});

// Logout (Mendukung GET & POST, aman dari error 419 Page Expired)
Route::match(['get', 'post'], '/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// ================= GROUP ROUTE TERPROTEKSI LOGIN =================
Route::middleware(['auth'])->group(function () {

    // ================= 1. ROLE: KEPEGAWAIAN =================
    Route::middleware(['role:kepegawaian'])->group(function () {
        Route::get('/dashboard-kepegawaian', [App\Http\Controllers\DashboardController::class, 'kepegawaian'])->name('dashboard.kepegawaian');

        Route::get('/kepegawaian/auditor', [App\Http\Controllers\AuditorController::class, 'index'])->name('kepegawaian.auditor.index');
        Route::get('/kepegawaian/auditor/create', [App\Http\Controllers\AuditorController::class, 'create'])->name('kepegawaian.auditor.create');
        Route::post('/kepegawaian/auditor', [App\Http\Controllers\AuditorController::class, 'store'])->name('kepegawaian.auditor.store');
        Route::get('/kepegawaian/auditor/{id}/edit', [App\Http\Controllers\AuditorController::class, 'edit'])->name('kepegawaian.auditor.edit');
        Route::put('/kepegawaian/auditor/{id}', [App\Http\Controllers\AuditorController::class, 'update'])->name('kepegawaian.auditor.update');
        Route::delete('/kepegawaian/auditor/{id}', [App\Http\Controllers\AuditorController::class, 'destroy'])->name('kepegawaian.auditor.destroy');

        Route::get('/kepegawaian/lembaga', [App\Http\Controllers\LembagaController::class, 'index'])->name('kepegawaian.lembaga.index');
        Route::post('/kepegawaian/lembaga', [App\Http\Controllers\LembagaController::class, 'store'])->name('kepegawaian.lembaga.store');
        Route::get('/kepegawaian/lembaga/{id}/edit', [App\Http\Controllers\LembagaController::class, 'edit'])->name('kepegawaian.lembaga.edit');
        Route::put('/kepegawaian/lembaga/{id}', [App\Http\Controllers\LembagaController::class, 'update'])->name('kepegawaian.lembaga.update');
        Route::delete('/kepegawaian/lembaga/{id}', [App\Http\Controllers\LembagaController::class, 'destroy'])->name('kepegawaian.lembaga.destroy');
        Route::get('/kepegawaian/ruang-lingkup', [App\Http\Controllers\RuangLingkupController::class, 'index'])->name('kepegawaian.ruanglinkup.index');
        Route::post('/kepegawaian/ruang-lingkup', [App\Http\Controllers\RuangLingkupController::class, 'store'])->name('kepegawaian.ruanglinkup.store');
        Route::get('/kepegawaian/ruang-lingkup/{id}/edit', [App\Http\Controllers\RuangLingkupController::class, 'edit'])->name('kepegawaian.ruanglinkup.edit');
        Route::put('/kepegawaian/ruang-lingkup/{id}', [App\Http\Controllers\RuangLingkupController::class, 'update'])->name('kepegawaian.ruanglinkup.update');
        Route::delete('/kepegawaian/ruang-lingkup/{id}', [App\Http\Controllers\RuangLingkupController::class, 'destroy'])->name('kepegawaian.ruanglinkup.destroy');

        Route::get('/kepegawaian/riwayat-auditor', [App\Http\Controllers\RiwayatAuditorController::class, 'index'])->name('kepegawaian.riwayatauditor.index');
        Route::get('/kepegawaian/riwayat-auditor/create', [App\Http\Controllers\RiwayatAuditorController::class, 'create'])->name('kepegawaian.riwayatauditor.create');
        Route::post('/kepegawaian/riwayat-auditor', [App\Http\Controllers\RiwayatAuditorController::class, 'store'])->name('kepegawaian.riwayatauditor.store');
        Route::get('/kepegawaian/riwayat-auditor/{id}/edit', [App\Http\Controllers\RiwayatAuditorController::class, 'edit'])->name('kepegawaian.riwayatauditor.edit');
        Route::put('/kepegawaian/riwayat-auditor/{id}', [App\Http\Controllers\RiwayatAuditorController::class, 'update'])->name('kepegawaian.riwayatauditor.update');
        Route::delete('/kepegawaian/riwayat-auditor/{id}', [App\Http\Controllers\RiwayatAuditorController::class, 'destroy'])->name('kepegawaian.riwayatauditor.destroy');

        Route::view('/kepegawaian/profil', 'kepegawaian.profil.index')->name('kepegawaian.profil.index');
    });

    // ================= 2. ROLE: PJI =================
    Route::middleware(['role:pji'])->group(function () {
        Route::view('/dashboard-pji', 'dashboard.pji')->name('dashboard.pji');

        Route::get('/pji/perusahaan', [App\Http\Controllers\PerusahaanController::class, 'index'])->name('pji.perusahaan.index');
        Route::get('/pji/perusahaan/create', [App\Http\Controllers\PerusahaanController::class, 'create'])->name('pji.perusahaan.create');
        Route::post('/pji/perusahaan', [App\Http\Controllers\PerusahaanController::class, 'store'])->name('pji.perusahaan.store');
        Route::get('/pji/perusahaan/{id}/edit', [App\Http\Controllers\PerusahaanController::class, 'edit'])->name('pji.perusahaan.edit');
        Route::put('/pji/perusahaan/{id}', [App\Http\Controllers\PerusahaanController::class, 'update'])->name('pji.perusahaan.update');
        Route::delete('/pji/perusahaan/{id}', [App\Http\Controllers\PerusahaanController::class, 'destroy'])->name('pji.perusahaan.destroy');

        Route::view('/pji/audit', 'pji.kelola_audit.index')->name('pji.audit.index');
        Route::view('/pji/audit/create', 'pji.kelola_audit.create')->name('pji.audit.create');
        Route::view('/pji/audit/edit', 'pji.kelola_audit.edit')->name('pji.audit.edit');
        Route::view('/pji/audit/generate', 'pji.kelola_audit.generate')->name('pji.audit.generate');

        Route::view('/pji/tim-audit', 'pji.tim_audit.index')->name('pji.timaudit.index');
        Route::view('/pji/review-katim', 'pji.review_katim_pji.index')->name('pji.reviewkatim.index');
        Route::view('/pji/review-katim/review', 'pji.review_katim_pji.review')->name('pji.reviewkatim.review');

        Route::view('/pji/profil', 'pji.profil.index')->name('pji.profil.index');
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
        Route::view('/operasional/kalender-audit', 'operasional.kalender_audit.index')->name('operasional.kalender.index');
        Route::view('/operasional/profil', 'operasional.profil.index')->name('operasional.profil.index');
    });

    // ================= 4. ROLE: KEPALA BALAI =================
    Route::middleware(['role:kepala balai'])->group(function () {
        Route::view('/dashboard-kepala-balai', 'dashboard.kepala_balai')->name('dashboard.kepala_balai');

        Route::view('/kepalabalai/approval-jadwal', 'kepalabalai.approval_jadwal.index')->name('kepalabalai.approval.index');
        Route::view('/kepalabalai/approval-jadwal/detail', 'kepalabalai.approval_jadwal.detail')->name('kepalabalai.approval.detail');
        Route::view('/kepalabalai/approval-jadwal/approval', 'kepalabalai.approval_jadwal.approval')->name('kepalabalai.approval.approve');

        Route::view('/kepala-balai/monitoring', 'kepalabalai.monitoring.index')->name('kepalabalai.monitoring.index');
        Route::view('/kepala-balai/monitoring/detail', 'kepalabalai.monitoring.detail')->name('kepalabalai.monitoring.detail');
        Route::view('/kepala-balai/kalender-audit', 'kepalabalai.kalender_audit.index')->name('kepalabalai.kalender.index');
        Route::view('/kepala-balai/grafik-penugasan', 'kepalabalai.grafik_penugasan.index')->name('kepalabalai.grafik.index');
        Route::view('/kepala-balai/profil', 'kepalabalai.profil.index')->name('kepalabalai.profil.index');
    });

});
