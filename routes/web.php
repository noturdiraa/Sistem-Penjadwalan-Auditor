<?php

use Illuminate\Support\Facades\Route;

// ================= LOGIN =================

Route::view('/', 'auth.login');
Route::view('/login', 'auth.login');

// ================= DASHBOARD =================

Route::view('/dashboard-pji', 'dashboard.pji');
Route::view('/dashboard-kepegawaian', 'dashboard.kepegawaian');
Route::view('/dashboard-operasional', 'dashboard.operasional');
Route::view('/dashboard-kepala-balai', 'dashboard.kepala_balai');

// ================= KEPEGAWAIAN =================

// Kelola Auditor
Route::view('/kepegawaian/auditor', 'kepegawaian.kelola_auditor.index');
Route::view('/kepegawaian/auditor/create', 'kepegawaian.kelola_auditor.create');
Route::view('/kepegawaian/auditor/edit', 'kepegawaian.kelola_auditor.edit');


// Profil
Route::view('/kepegawaian/profil', 'kepegawaian.profil.index');