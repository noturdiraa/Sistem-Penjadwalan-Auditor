<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlasanPenolakan extends Model
{
    protected $table = 'alasan_penolakans';

    protected $primaryKey = 'id_penolakan';

    protected $fillable = [
        'id_review_operasional',
        'alasan_penolakan',
    ];

    public $timestamps = true;

    // Relasi ke Review Operasional
    public function reviewOperasional()
    {
        return $this->belongsTo(
            ReviewOperasional::class,
            'id_review_operasional',
            'id_review_operasional'
        );
    }
}