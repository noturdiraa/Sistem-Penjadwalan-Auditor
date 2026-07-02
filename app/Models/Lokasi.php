<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable = [
        'nama_lokasi',
    ];

    public function perusahaans()
    {
        return $this->hasMany(Perusahaan::class);
    }
}