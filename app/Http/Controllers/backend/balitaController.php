<?php

/**
 * Description of welcome
 *
 * @author Danang Saputro
 * Github : danangsptro
 */

namespace App\Http\Controllers\backend;

use App\model\balita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class balitaController extends Controller
{
    // Index
    public function index()
    {
        $data = balita::all();
        return view('backend.balita.index', compact('data'));
    }

    // Create
    public function create()
    {
        return view('backend.balita.create-balita');
    }

    // Tahap Proses Create
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama'          => 'required|max:30',
            'umur'          => 'required|max:15',
            'jenis_kelamin' => 'required|max:15',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required|max:50'
        ]);

        $balita                 = new balita();
        $balita->nama           = $validate['nama'];
        $balita->umur           = $validate['umur'];
        $balita->jenis_kelamin  = $validate['jenis_kelamin'];
        $balita->tanggal_lahir  = $validate['tanggal_lahir'];
        $balita->alamat         = $validate['alamat'];
        $balita->save();

        if ($balita) {
            toast("Data $balita->nama Berhasil Di Tambahkan ", 'success');
            return redirect()->route('index-balita');
        } else {
            toast("Data $balita->nama Gagal Di Tambahkan ", 'error');
            return redirect()->route('index-balita');
        }
    }

    // Edit
    public function edit($id)
    {
        $balita = balita::where('id', $id)->first();
        return view('backend.balita.edit-balitan', compact('balita'));
    }

    // Tahap Proses Edit
    public function update(Request $request)
    {
        $request->validate([
            'nama'          =>  'required',
            'umur'          =>  'required',
            'jenis_kelamin' =>  'required',
            'tanggal_lahir' =>  'required',
            'alamat'        =>  'required'
        ]);

        $id = $request->id;

        $balita = balita::find($id);

        $balita->update([
            'nama'          => $request->nama,
            'umur'          => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat
        ]);

        if ($balita) {
            toast("Data $balita->nama Berhasil Di Edit ", 'success');
            return redirect()->route('index-balita');
        } else {
            toast("Data $balita->nama Gagal Di Edit ", 'error');
            return redirect()->route('index-balita');
        }
    }

    // Delete
    public function delete(balita $balita)
    {
        $balita->delete();
        if ($balita) {
            toast("Data $balita->nama Berhasil Di hapus ", 'success');
            return redirect()->back();
        } else {
            toast("Data $balita->nama Gagal Di hapus ", 'error');
            return redirect()->back();
        }
    }
}
