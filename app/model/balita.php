<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class balita extends Model
{
    protected $guarded = [];

    public function balita()
    {
        return $this->hasMany(checkup::class, 'id_balita', 'id');
    }
}
