<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class checkup extends Model
{
    protected $guarded = [];

    public function idVitamin()
    {
        return $this->belongsTo(jenis_vitamin::class, 'nama_vitamin', 'id');
    }

    public function idImunisasi()
    {
        return $this->belongsTo(jenis_imunisasi::class, 'nama_imunisasi', 'id');
    }

    public function idBalita()
    {
        return $this->belongsTo(balita::class, 'id_balita', 'id');
    }
}
