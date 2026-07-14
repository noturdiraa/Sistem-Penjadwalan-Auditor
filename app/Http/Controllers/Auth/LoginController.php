<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * 1. Menampilkan Halaman Login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * 2. Memproses Request Login User
     */
    public function login(Request $request)
    {
        // Validasi input form login
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mengambil data username & password dari form
        $credentials = $request->only('username', 'password');

        // Mencoba login ke database
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Jika sukses, buat ulang session agar aman
            $request->session()->regenerate();

            // Jalankan pengalihan halaman berdasarkan role
            return $this->authenticated($request, Auth::user());
        }

        // Jika login gagal, kirim pesan error kembali ke halaman login
        throw ValidationException::withMessages([
            'username' => ['Username atau password salah.'],
        ]);
    }

    /**
     * 3. Logic Redirect Berdasarkan Role
     */
    protected function authenticated(Request $request, $user)
    {
        $role = strtolower($user->role);

        if ($role === 'kepegawaian') {
            return redirect()->route('dashboard.kepegawaian');
        } elseif ($role === 'pji') {
            return redirect()->route('dashboard.pji');
        } elseif ($role === 'kepala balai') {
            return redirect()->route('dashboard.kepala_balai');
        } elseif ($role === 'operasional') {
            return redirect()->route('dashboard.operasional');
        }

        return redirect('/home');
    }

    /**
     * 4. Memproses Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
