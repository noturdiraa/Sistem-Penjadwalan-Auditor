<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailAuditor extends Model
{
    protected $table = 'detail_auditors';

    protected $primaryKey = 'id_detail_auditor';

    protected $fillable = [
        'id_auditor',
        'id_ruang_lingkup',
    ];

    public $timestamps = true;

    // Relasi ke Auditor
    public function auditor()
    {
        return $this->belongsTo(Auditor::class, 'id_auditor', 'id_auditor');
    }

    // Relasi ke Ruang Lingkup
    public function ruangLingkup()
    {
        return $this->belongsTo(RuangLingkup::class, 'id_ruang_lingkup', 'id_ruang_lingkup');
    }
}