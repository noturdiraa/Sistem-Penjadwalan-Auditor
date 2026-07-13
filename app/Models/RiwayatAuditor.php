<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatAuditor extends Model
{
    protected $table = 'riwayat_auditors';

    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'id_auditor',
        'id_audit',
        'id_jadwal',
        'peran_auditor',
        'status_penugasan',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
    ];

    public $timestamps = true;

    public function auditor()
    {
        return $this->belongsTo(Auditor::class, 'id_auditor', 'id_auditor');
    }

    public function audit()
    {
        return $this->belongsTo(Audit::class, 'id_audit', 'id_audit');
    }

    public function jadwalAudit()
    {
        return $this->belongsTo(JadwalAudit::class, 'id_jadwal', 'id_jadwal');
    }
}