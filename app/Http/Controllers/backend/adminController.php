<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\balita;
use App\model\jenis_imunisasi;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index ()
    {
        $balita             = balita::all();
        $jenisImunisasi     = jenis_imunisasi::all();
        return view('backend.dashboard-admin', compact('balita', 'jenisImunisasi'));
    }
}
