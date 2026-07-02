<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login');
Route::view('/login', 'auth.login');