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
Route::view('/kepegawaian/profil/edit', 'kepegawaian.profil.edit');

// ================= OPERASIONAL =================

// Review Jadwal Audit
Route::view('/operasional/review-jadwal', 'operasional.review_jadwal_audit.index');
Route::view('/operasional/review-jadwal/review', 'operasional.review_jadwal_audit.review');

// Input Auditor Manual
Route::view('/operasional/input-auditor', 'operasional.input_auditor_manual.index');

// Riwayat Review
Route::view('/operasional/riwayat-review', 'operasional.riwayat_review.index');

// Profil
Route::view('/operasional/profil', 'operasional.profil.index');

// ================= PJI =================

// Kelola Perusahaan
Route::view('/pji/perusahaan', 'pji.kelola_perusahaan.index');
Route::view('/pji/perusahaan/create', 'pji.kelola_perusahaan.create');
Route::view('/pji/perusahaan/edit', 'pji.kelola_perusahaan.edit');

// Kelola Audit
Route::view('/pji/audit', 'pji.kelola_audit.index');
Route::view('/pji/audit/create', 'pji.kelola_audit.create');
Route::view('/pji/audit/edit', 'pji.kelola_audit.edit');
Route::view('/pji/audit/generate', 'pji.kelola_audit.generate');

// Jadwal Audit
Route::view('/pji/jadwal', 'pji.jadwal_audit.index');

// Tim Audit
Route::view('/pji/tim-audit', 'pji.tim_audit.index');

// Review Katim PJI
Route::view('/pji/review-katim', 'pji.review_katim_pji.index');
Route::view('/pji/review-katim/review', 'pji.review_katim_pji.review');

// Profil
Route::view('/pji/profil', 'pji.profil.index');
Route::view('/pji/profil/edit', 'pji.profil.edit');