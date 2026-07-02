<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login');
Route::view('/login', 'auth.login');

Route::view('/dashboard-operasional', 'dashboard.operasional');
Route::view('/dashboard-pji', 'dashboard.pji');
Route::view('/dashboard-kepegawaian', 'dashboard.kepegawaian');
Route::view('/dashboard-kepala-balai', 'dashboard.kepala_balai');