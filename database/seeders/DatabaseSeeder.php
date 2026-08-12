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
        $defaultUsers = [
            [
                'nama_user' => 'Administrator',
                'username' => 'adminbspji',
                'password' => Hash::make('BSPJI123'),
                'password_plain' => 'BSPJI123',
                'role' => 'Admin',
            ],
            [
                'nama_user' => 'kepegawaianbspji',
                'username' => 'kepegawaianbspji',
                'password' => Hash::make('bspji123'),
                'password_plain' => 'bspji123',
                'role' => 'Kepegawaian',
            ],
            [
                'nama_user' => 'pjibspji',
                'username' => 'pjibspji',
                'password' => Hash::make('bspji123'),
                'password_plain' => 'bspji123',
                'role' => 'PJI',
            ],
            [
                'nama_user' => 'operasionalbspji',
                'username' => 'operasionalbspji',
                'password' => Hash::make('bspji123'),
                'password_plain' => 'bspji123',
                'role' => 'Operasional',
            ],
            [
                'nama_user' => 'kepalabalaibspji',
                'username' => 'kepalabalaibspji',
                'password' => Hash::make('bspji123'),
                'password_plain' => 'bspji123',
                'role' => 'Kepala Balai',
            ],
        ];

        foreach ($defaultUsers as $u) {
            User::firstOrCreate(
                ['username' => $u['username']],
                [
                    'nama_user' => $u['nama_user'],
                    'password' => $u['password'],
                    'password_plain' => $u['password_plain'],
                    'role' => $u['role'],
                ]
            );
        }
    }
}
