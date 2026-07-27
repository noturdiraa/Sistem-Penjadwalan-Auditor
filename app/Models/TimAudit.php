<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimAudit extends Model
{
    protected $table = 'tim_audits';

    protected static function booted()
    {
        static::created(function ($timAudit) {
            $jadwal = $timAudit->jadwalAudit;
            if ($jadwal && $jadwal->audit) {
                $kategoriWilayah = $jadwal->lokasi ? $jadwal->lokasi->kategori_wilayah : null;

                \App\Models\RiwayatAuditor::create([
                    'id_auditor' => $timAudit->id_auditor,
                    'id_perusahaan' => $jadwal->audit->id_perusahaan,
                    'id_lembaga' => $jadwal->audit->id_ruang_lingkup ? $jadwal->audit->ruangLingkup->id_lembaga : null,
                    'jenis_audit' => $jadwal->audit->jenis_audit,
                    'id_audit' => $jadwal->id_audit,
                    'id_jadwal' => $jadwal->id_jadwal,
                    'peran_auditor' => $timAudit->peran,
                    'status_penugasan' => $jadwal->status_jadwal === 'Selesai' ? 'Selesai' : 'Berlangsung',
                    'tanggal_mulai' => $jadwal->tanggal_mulai,
                    'tanggal_selesai' => $jadwal->tanggal_selesai,
                    'kategori_wilayah' => $kategoriWilayah,
                ]);
            }
        });

        static::deleted(function ($timAudit) {
            \App\Models\RiwayatAuditor::where('id_jadwal', $timAudit->id_jadwal)
                ->where('id_auditor', $timAudit->id_auditor)
                ->delete();
        });
    }

    protected $primaryKey = 'id_tim';

    protected $fillable = [
        'id_jadwal',
        'id_auditor',
        'peran',
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