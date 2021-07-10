<?php

/**
 * Description of welcome
 *
 * @author Danang Saputro
 * Github : danangsptro
 */

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\balita;
use App\model\checkup;
use App\model\jenis_imunisasi;
use App\model\jenis_vitamin;
use Illuminate\Http\Request;

class checkUpController extends Controller
{
    // Index
    public function index()
    {
        $data  = checkup::all();
        return view('backend.checkUp.index', compact('data'));
    }

    // Create
    public function create()
    {
        $balita           = balita::all();
        $jenisVitamin     = jenis_vitamin::all();
        $jenisImunisasi   = jenis_imunisasi::all();

        return view('backend.checkUp.create-checkUp', compact('balita', 'jenisVitamin', 'jenisImunisasi'));
    }

    // Tahap Proses Create
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
        $checkUp->save();

        if ($checkUp) {
            toast("Data Berhasil Di Tambahkan ", 'success');
            return redirect()->route('index-checkUp');
        } else {
            toast("Data Gagal Di Tambahkan ", 'error');
            return redirect()->route('index-checkUp');
        }
    }

    // Edit
    public function edit($id)
    {
        $checkUp          = checkup::find($id);
        $balita           = balita::all();
        $jenisImunisasi   = jenis_imunisasi::all();
        $jenisVitamin     = jenis_vitamin::all();
        return view('backend.checkUp.edit-checkUp', compact('checkUp', 'balita', 'jenisImunisasi', 'jenisVitamin'));
    }

    // Tahap Proses Edit
    public function update(Request $request)
    {
        $request->validate([
            'nama_vitamin'      => 'required|min:1',
            'nama_imunisasi'    => 'required|min:1',
            'id_balita'         => 'required|min:1',
            'berat_balita'      => 'required|min:1',
            'tanggal_imunisasi' => 'required'
        ]);

        $id = $request->id;

        $checkUp = checkup::find($id);

        $checkUp->update([
            'nama_vitamin'      => $request->nama_vitamin,
            'nama_imunisasi'    => $request->nama_imunisasi,
            'id_balita'         => $request->id_balita,
            'berat_balita'      => $request->berat_balita,
            'tanggal_imunisasi' => $request->tanggal_imunisasi
        ]);

        if ($checkUp) {
            toast("Data Berhasil Di Edit ", 'success');
            return redirect()->route('index-checkUp');
        } else {
            toast("Data Gagal Di Edit ", 'error');
            return redirect()->route('index-checkUp');
        }
    }

    // Delete
    public function delete(checkup $checkUp)
    {
        $checkUp->delete();

        if ($checkUp) {
            toast("Data Berhasil Di Hapus ", 'success');
            return redirect()->route('index-checkUp');
        } else {
            toast("Data Gagal Di Hapus ", 'error');
            return redirect()->route('index-checkUp');
        }
    }
}
