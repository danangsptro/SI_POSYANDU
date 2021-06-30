<?php

namespace App\Http\Controllers\backend;

use App\model\balita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class balitaController extends Controller
{
    public function index ()
    {
        $data = balita::all();
        return view('backend.balita.index', compact('data'));
    }

    public function create ()
    {
        return view('backend.balita.create-balita');
    }

    public function store (Request $request)
    {
        $validate = $request->validate([
            'nama'          => 'required|max:30',
            'umur'          => 'required|max:15',
            'jenis_kelamin' => 'required|max:15',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required|max:50'
        ]);

        $balita = new balita();
        $balita->nama           = $validate['nama'];
        $balita->umur           = $validate['umur'];
        $balita->jenis_kelamin  = $validate['jenis_kelamin'];
        $balita->tanggal_lahir  = $validate['tanggal_lahir'];
        $balita->alamat         = $validate['alamat'];
        $balita->save();

        if ($balita) {
            return redirect()->route('index-balita')->with(['sukses' => 'Sukses Tambah Data Balita']);
        } else {
            return redirect()->route('index-balita')->with(['gagal' => 'Gagal Tambah Data Balita']);
        }
    }

    public function edit($id)
    {
        $balita = balita::where('id', $id)->first();
        return view('backend.balita.edit-balitan', compact('balita'));
    }

    public function update(Request $request, balita $balita)
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
            return redirect()->route('index-balita')->with(['sukses' => 'Sukses Edit Data Balita']);
        } else {
            return redirect()->route('index-balita')->with(['gagal' => 'Gagal Tambah Data Balita']);
        }
    }

    public function delete (balita $balita)
    {
        $balita->delete();

        if ($balita) {
            return redirect()->route('index-balita')->with(['sukses' => 'Sukses Hapus Data Balita']);
        } else {
            return redirect()->route('index-balita')->with(['gagal' => 'Gagal Tambah Data Balita']);
        }
    }
}
