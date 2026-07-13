<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekomendasiAuditor extends Model
{
    protected $table = 'rekomendasi_auditors';

    protected $primaryKey = 'id_rekomendasi';

    protected $fillable = [
        'id_jadwal',
        'id_auditor',
        'nilai_rekomendasi',
    ];

    public $timestamps = true;

    // Relasi ke Jadwal Audit
    public function jadwalAudit()
    {
        return $this->belongsTo(JadwalAudit::class, 'id_jadwal', 'id_jadwal');
    }

    // Relasi ke Auditor
    public function auditor()
    {
        return $this->belongsTo(Auditor::class, 'id_auditor', 'id_auditor');
    }
}