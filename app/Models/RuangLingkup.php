<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuangLingkup extends Model
{
    protected $fillable = [
        'lembaga_id',
        'nama_ruang_lingkup',
    ];

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class);
    }

    public function detailAuditors()
    {
        return $this->hasMany(DetailAuditor::class);
    }
}