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

    public function audits()
    {
        return $this->hasMany(Audit::class, 'id_lokasi', 'id_lokasi');
    }
}