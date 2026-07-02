<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    protected $fillable = [
        'nama_auditor',
        'nip',
        'jabatan',
        'status',
    ];

    public function detailAuditors()
    {
        return $this->hasMany(DetailAuditor::class);
    }
}