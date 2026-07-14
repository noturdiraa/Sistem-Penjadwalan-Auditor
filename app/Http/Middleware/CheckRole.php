<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan user sudah login
        if (auth()->check()) {
            // Ubah role user dan parameter role ke huruf kecil agar case-insensitive (kebal huruf besar/kecil)
            $userRole = strtolower(auth()->user()->role);
            $allowedRoles = array_map('strtolower', $roles);

            if (in_array($userRole, $allowedRoles)) {
                return $next($request);
            }
        }

        // Jika tidak diizinkan, tampilkan error 403 (Forbidden)
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}