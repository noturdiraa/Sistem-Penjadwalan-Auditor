<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'Kepegawaian') {
            return redirect()->route('dashboard.kepegawaian');
        } elseif ($user->role === 'PJI') {
            return redirect()->route('dashboard.pji');
        } elseif ($user->role === 'Kepala Balai') {
            return redirect()->route('dashboard.kepala_balai');
        } elseif ($user->role === 'Operasional') {
            return redirect()->route('dashboard.operasional');
        }

        return redirect('/home');
    }
}
