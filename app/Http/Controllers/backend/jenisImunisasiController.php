<?php

namespace App\Http\Controllers\backend;

use App\model\jenis_imunisasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jenisImunisasiController extends Controller
{
    // Index
    public function index()
    {
        $data = jenis_imunisasi::all();
        return view('backend.jenisImunisasi.index', compact('data'));
    }

    // Create
    public function create()
    {
        return view('backend.jenisImunisasi.create-jenisImunisasi');
    }

    // Tahap Proses Create
    public function store(Request $request)
    {
        $validate = $request->validate([
            'imunisasi' =>  'required|max:20'
        ]);

        $jenis_imunisasi              = new jenis_imunisasi();
        $jenis_imunisasi->imunisasi   = $validate['imunisasi'];
        $jenis_imunisasi->save();

        if ($jenis_imunisasi) {
            toast("Data $jenis_imunisasi->imunisasi Berhasil Di Tambahkan ", 'success');
            return redirect()->route('index-jenisImunisasi');
        } else {
            toast("Data $jenis_imunisasi->imunisasi Gagal Di Tambahkan ", 'error');
            return redirect()->route('index-jenisImunisasi');
        }
    }

    // Edit
    public function edit($id)
    {
        $jenis_imunisasi = jenis_imunisasi::find($id);
        return view('backend.jenisImunisasi.edit-jenisImunisasi', compact('jenis_imunisasi'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'imunisasi' => 'required'
        ]);

        $id = $request->id;

        $jenis_imunisasi = jenis_imunisasi::find($id);

        $jenis_imunisasi->update([
            'imunisasi' => $request->imunisasi
        ]);

        if ($jenis_imunisasi) {
            toast("Data $jenis_imunisasi->imunisasi Berhasil Di Edit ", 'success');
            return redirect()->route('index-jenisImunisasi');
        } else {
            toast("Data $jenis_imunisasi->imunisasi Gagal Di Edit ", 'error');
            return redirect()->route('index-jenisImunisasi');
        }
    }

    // Delete
    public function delete(jenis_imunisasi $jenis_imunisasi)
    {
        $jenis_imunisasi->delete();

        if ($jenis_imunisasi) {
            toast("Data $jenis_imunisasi->imunisasi Berhasil Di hapus ", 'success');
            return redirect()->back();
        } else {
            toast("Data $jenis_imunisasi->imunisasi Gagal Di hapus ", 'error');
            return redirect()->back();
        }
    }
}
