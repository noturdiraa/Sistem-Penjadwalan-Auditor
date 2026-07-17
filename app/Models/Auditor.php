<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    protected $table = 'auditors';

    protected $primaryKey = 'id_auditor';

    protected $fillable = [
        'nama_auditor',
        'nip',
        'jenis_auditor',
        'posisi',
        'status',
    ];

    public $timestamps = true;

    public function detailAuditors()
    {
        return $this->hasMany(DetailAuditor::class, 'id_auditor', 'id_auditor');
    }

    public function timAudits()
    {
        return $this->hasMany(TimAudit::class, 'id_auditor', 'id_auditor');
    }

    public function riwayatAuditors()
    {
        return $this->hasMany(RiwayatAuditor::class, 'id_auditor', 'id_auditor');
    }

    public function rekomendasiAuditors()
    {
        return $this->hasMany(RekomendasiAuditor::class, 'id_auditor', 'id_auditor');
    }
}