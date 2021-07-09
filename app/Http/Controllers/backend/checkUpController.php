<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\balita;
use App\model\checkup;
use App\model\jenis_imunisasi;
use App\model\jenis_vitamin;
use Illuminate\Http\Request;

class checkUpController extends Controller
{
    public function index()
    {
        $data  = checkup::all();
        return view('backend.checkUp.index', compact('data'));
    }

    public function create()
    {
        $balita           = balita::all();
        $jenisVitamin     = jenis_vitamin::all();
        $jenisImunisasi   = jenis_imunisasi::all();

        return view('backend.checkUp.create-checkUp', compact('balita', 'jenisVitamin', 'jenisImunisasi'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_vitamin'      => 'required|min:1',
            'nama_imunisasi'    => 'required|min:1',
            'id_balita'         => 'required|min:1',
            'berat_balita'      => 'required|min:1',
            'tanggal_imunisasi' => 'required'
        ]);

        $checkUp                    = new checkup();
        $checkUp->nama_vitamin      = $validate['nama_vitamin'];
        $checkUp->nama_imunisasi    = $validate['nama_imunisasi'];
        $checkUp->id_balita         = $validate['id_balita'];
        $checkUp->berat_balita      = $validate['berat_balita'];
        $checkUp->tanggal_imunisasi = $validate['tanggal_imunisasi'];
        // dd($checkUp);
        $checkUp->save();

        if ($checkUp) {
            toast("Data $checkUp->id_balita Berhasil Di Tambahkan ", 'success');
            return redirect()->route('index-checkUp');
        } else {
            toast("Data $checkUp->id_balita Gagal Di Tambahkan ", 'error');
            return redirect()->route('index-checkUp');
        }
    }

    public function delete(checkup $checkUp)
    {
        $checkUp->delete();

        if ($checkUp) {
            toast("Data $checkUp->id_balita Berhasil Di Hapus ", 'success');
            return redirect()->route('index-checkUp');
        } else {
            toast("Data $checkUp->id_balita Gagal Di Hapus ", 'error');
            return redirect()->route('index-checkUp');
        }
    }
}
