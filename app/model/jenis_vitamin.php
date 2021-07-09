<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class jenis_vitamin extends Model
{
    protected $guarded = [];

    public function vitamin()
    {
        return $this->hasMany(balita::class, 'nama_vitamin', 'id');
    }
}
