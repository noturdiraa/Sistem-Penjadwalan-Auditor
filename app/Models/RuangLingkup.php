<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuangLingkup extends Model
{
    protected $table = 'ruang_lingkups';

    protected $primaryKey = 'id_ruang_lingkup';

    protected $fillable = [
        'id_lembaga',
        'nama_ruang_lingkup',
    ];

    public $timestamps = true;

    // Relasi ke Lembaga
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'id_lembaga', 'id_lembaga');
    }

    // Relasi ke Detail Auditor
    public function detailAuditors()
    {
        return $this->hasMany(DetailAuditor::class, 'id_ruang_lingkup', 'id_ruang_lingkup');
    }

    // Relasi ke Audit
    public function audits()
    {
        return $this->hasMany(Audit::class, 'id_ruang_lingkup', 'id_ruang_lingkup');
    }
}