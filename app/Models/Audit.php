<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $table = 'audits';

    protected $primaryKey = 'id_audit';

    protected $fillable = [
        'id_perusahaan',
        'id_ruang_lingkup',
        'tanggal_permohonan',
        'jenis_audit',
        'status',
    ];

    public $timestamps = true;

    // Relasi ke Perusahaan
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }

    // Relasi ke Ruang Lingkup
    public function ruangLingkup()
    {
        return $this->belongsTo(RuangLingkup::class, 'id_ruang_lingkup', 'id_ruang_lingkup');
    }

    // Relasi ke Jadwal Audit
    public function jadwalAudits()
    {
        return $this->hasMany(JadwalAudit::class, 'id_audit', 'id_audit');
    }

    // Relasi ke Tim Audit
    public function timAudits()
    {
        return $this->hasMany(TimAudit::class, 'id_audit', 'id_audit');
    }

    // Relasi ke Riwayat Auditor
    public function riwayatAuditors()
    {
        return $this->hasMany(RiwayatAuditor::class, 'id_audit', 'id_audit');
    }
}