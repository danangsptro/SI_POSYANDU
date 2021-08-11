<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class kaderController extends Controller
{
    public function index()
    {
        $kader = User::where('name', Auth::user()->name)->get();
        return view('backend.kader.index', compact('kader'));
    }

    public function edit($id)
    {
        $kader = User::find($id);
        return view('backend.kader.edit-kader', compact('kader'));
    }

    public function update(Request $request, $id)
    {
        $validasiData = $request->validate([
            'name'          => 'required|min:2',
            'status'        => 'required',
            'jenis_kelamin' => 'required',
            'jabatan'       => 'required',
            'foto'          => 'mimes:png,jpg,jpeg'
        ]);

        $kader = User::where('id', $id)->first();
        $kader->name          = $validasiData['name'];
        $kader->status        = $validasiData['status'];
        $kader->jenis_kelamin = $validasiData['jenis_kelamin'];
        $kader->jabatan       = $validasiData['jabatan'];

        if (!$request->foto) {
            $kader->foto = $kader->foto;
        } elseif (Storage::url($kader->foto)) {
            Storage::delete('public/' . $kader->foto);
            $kader->foto = $request->file('foto')->store('asset/kader', 'public');
        } else {
            $validasiData['foto'] = $request->file('foto')->store('asset/kader', 'public');
            $kader->foto = $validasiData['foto'];
        }
        $kader->save();

        if ($kader) {
            toast("Data Berhasil Di Edit ", 'success');
            return redirect()->route('index-kader');
        } else {
            toast("Data Berhasil Di Edit ", 'success');
            return redirect()->route('index-kader');
        }
    }
}
