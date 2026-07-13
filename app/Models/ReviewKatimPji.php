<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewKatimPji extends Model
{
    protected $table = 'review_katim_pjis';

    protected $primaryKey = 'id_review_katim';

    protected $fillable = [
        'id_jadwal',
        'id_user',
        'status_review',
        'catatan',
    ];

    public $timestamps = true;

    // Relasi ke Jadwal Audit
    public function jadwalAudit()
    {
        return $this->belongsTo(JadwalAudit::class, 'id_jadwal', 'id_jadwal');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}