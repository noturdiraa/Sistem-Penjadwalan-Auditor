<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Kepegawaian
        User::create([
            'nama_user' => 'Admin Kepegawaian',
            'username'  => 'kepegawaianbspji',
            'password'  => Hash::make('bspji123'),
            'role'      => 'kepegawaian',
        ]);

        // 2. Akun PJI
        User::create([
            'nama_user' => 'Staff PJI',
            'username'  => 'pjibspji',
            'password'  => Hash::make('bspji123'),
            'role'      => 'pji',
        ]);

        // 3. Akun Kepala Balai
        User::create([
            'nama_user' => 'Kepala Balai',
            'username'  => 'kepalabalaibspji',
            'password'  => Hash::make('bspji123'),
            'role'      => 'kepala balai',
        ]);

        // 4. Akun Operasional
        User::create([
            'nama_user' => 'Staff Operasional',
            'username'  => 'operasionalbspji',
            'password'  => Hash::make('bspji123'),
            'role'      => 'operasional',
        ]);
    }
}
