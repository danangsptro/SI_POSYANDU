<?php


namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\balita;
use App\model\checkup;
use App\model\jenis_imunisasi;
use App\model\jenis_vitamin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index ()
    {
        $balita             = balita::all();
        $checkUp            = checkup::all();
        $jenisImunisasi     = jenis_imunisasi::all();
        $jenisVitamin       = jenis_vitamin::all();

        return view('backend.dashboard-admin', compact('balita', 'jenisImunisasi', 'jenisVitamin', 'checkUp'));
    }
}
