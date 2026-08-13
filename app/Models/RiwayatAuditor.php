<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatAuditor extends Model
{
    protected $table = 'riwayat_auditors';

    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'id_auditor',
        'id_perusahaan',
        'id_lembaga',
        'jenis_audit',
        'tim_audit_lainnya',
        'kategori_wilayah',
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

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'id_lembaga', 'id_lembaga');
    }

    public function audit()
    {
        return $this->belongsTo(Audit::class, 'id_audit', 'id_audit');
    }

    public function jadwalAudit()
    {
        return $this->belongsTo(JadwalAudit::class, 'id_jadwal', 'id_jadwal');
    }

    // Accessor untuk menyelaraskan status secara dinamis dari jadwal audit
    public function getStatusPenugasanAttribute($value)
    {
        if ($this->id_jadwal && $this->jadwalAudit) {
            $status = $this->jadwalAudit->status_jadwal === 'Selesai' ? 'Selesai' : 'Berlangsung';
            if ($value !== $status) {
                $this->status_penugasan = $status;
                $this->saveQuietly();
            }
            return $status;
        }
        return $value;
    }
}