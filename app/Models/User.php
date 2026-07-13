<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_user',
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Relasi ke Review Katim PJI
    public function reviewKatimPjis()
    {
        return $this->hasMany(ReviewKatimPji::class, 'id_user', 'id_user');
    }

    // Relasi ke Review Teknis
    public function reviewTeknis()
    {
        return $this->hasMany(ReviewTeknis::class, 'id_user', 'id_user');
    }
}