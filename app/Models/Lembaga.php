<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembagas';

    protected $primaryKey = 'id_lembaga';

    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
    ];

    public $timestamps = true;

    // Satu lembaga memiliki banyak ruang lingkup
    public function ruangLingkups()
    {
        return $this->hasMany(RuangLingkup::class, 'id_lembaga', 'id_lembaga');
    }
}