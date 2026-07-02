<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
    ];

    public function ruangLingkups()
    {
        return $this->hasMany(RuangLingkup::class);
    }

    public function detailAuditors()
    {
        return $this->hasMany(DetailAuditor::class);
    }
}