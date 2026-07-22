<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaans';

    protected $primaryKey = 'id_perusahaan';

    protected $fillable = [
        'nama_perusahaan',
        'no_telepon',
        'email',
        'alamat',
        'status',
    ];

    public $timestamps = true;

    // Relasi ke Audit
    public function audits()
    {
        return $this->hasMany(Audit::class, 'id_perusahaan', 'id_perusahaan');
    }
}