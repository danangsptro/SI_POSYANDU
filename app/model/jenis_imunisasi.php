<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class jenis_imunisasi extends Model
{
    protected $guarded = [];

    public function imunisasi ()
    {
        return $this->hasMany(checkup::class, 'nama_imunisasi', 'id');
    }
}
