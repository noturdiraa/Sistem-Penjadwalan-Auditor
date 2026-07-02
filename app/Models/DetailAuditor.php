<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailAuditor extends Model
{
    protected $fillable = [
        'auditor_id',
        'lembaga_id',
        'ruang_lingkup_id',
    ];

    public function auditor()
    {
        return $this->belongsTo(Auditor::class);
    }

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class);
    }

    public function ruangLingkup()
    {
        return $this->belongsTo(RuangLingkup::class);
    }
}