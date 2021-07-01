<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\jenis_imunisasi;
use Illuminate\Http\Request;

class jenisImunisasiController extends Controller
{
    // Index
    public function index ()
    {
        $data = jenis_imunisasi::all();
        return view('backend.jenisImunisasi.index', compact('data'));
    }

    // Create
    public function create ()
    {
        return view('backend.jenisImunisasi.create-jenisImunisasi');
    }

    // Tahap Proses Create
    public function store (Request $request)
    {
        $validate = $request->validate([
            'imunisasi' =>  'required|max:20'
        ]);

        $jenis_imunisasi              = new jenis_imunisasi();
        $jenis_imunisasi->imunisasi   = $validate['imunisasi'];
        $jenis_imunisasi->save();

        if ($jenis_imunisasi) {
            return redirect()->route('index-jenisImunisasi')->with('sukses', 'Sukses Tambah Data Jenis Imunisasi');
        } else{
            return redirect()->route('index-jenisImunisasi')->with('gagal', 'Gagal Input Data Jenis Imunisasi');
        }
    }
}
