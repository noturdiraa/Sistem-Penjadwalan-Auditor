<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalAudit extends Model
{
    protected $table = 'jadwal_audits';

    protected static function booted()
    {
        static::retrieved(function ($jadwal) {
            if ($jadwal->status_jadwal === 'Aktif' && $jadwal->tanggal_selesai && \Carbon\Carbon::now()->startOfDay()->gt(\Carbon\Carbon::parse($jadwal->tanggal_selesai))) {
                $jadwal->status_jadwal = 'Selesai';
                $jadwal->saveQuietly();

                if ($jadwal->audit && $jadwal->audit->status === 'Aktif') {
                    $jadwal->audit->status = 'Selesai';
                    $jadwal->audit->saveQuietly();
                }
            }
        });
    }

    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_audit',
        'id_lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_jadwal',
        'keterangan',
    ];

    public $timestamps = true;

    // Relasi ke Audit
    public function audit()
    {
        return $this->belongsTo(Audit::class, 'id_audit', 'id_audit');
    }

    // Relasi ke Lokasi
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id_lokasi');
    }

    // Relasi ke Tim Audit
    public function timAudits()
    {
        return $this->hasMany(TimAudit::class, 'id_jadwal', 'id_jadwal');
    }

    // Relasi ke Review Katim PJI
    public function reviewKatimPjis()
    {
        return $this->hasMany(ReviewKatimPji::class, 'id_jadwal', 'id_jadwal');
    }

    // Relasi ke Review Teknis
    public function reviewTeknis()
    {
        return $this->hasMany(ReviewOperasional::class, 'id_jadwal', 'id_jadwal');
    }

    // Relasi ke Riwayat Auditor
    public function riwayatAuditors()
    {
        return $this->hasMany(RiwayatAuditor::class, 'id_jadwal', 'id_jadwal');
    }
}