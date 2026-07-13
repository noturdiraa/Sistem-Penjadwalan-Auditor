<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasis';

    protected $primaryKey = 'id_lokasi';

    protected $fillable = [
        'nama_lokasi',
        'keterangan',
    ];

    public $timestamps = true;

    // Relasi ke Jadwal Audit
    public function jadwalAudits()
    {
        return $this->hasMany(JadwalAudit::class, 'id_lokasi', 'id_lokasi');
    }
}