<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaans';

    protected $primaryKey = 'id_perusahaan';

    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'provinsi',
        'no_telepon',
        'status',
    ];

    public $timestamps = true;

    // Relasi ke Audit
    public function audits()
    {
        return $this->hasMany(Audit::class, 'id_perusahaan', 'id_perusahaan');
    }
}