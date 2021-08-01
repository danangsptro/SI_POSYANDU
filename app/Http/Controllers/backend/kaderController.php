<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kaderController extends Controller
{
    public function index ()
    {
        $kader = User::where('name', Auth::user()->name)->get();
        return view('backend.kader.index', compact('kader'));
    }

    public function edit ($id)
    {
        $kader = User::find($id);
        return view('backend.kader.edit-kader', compact('kader'));
    }

    public function update (Request $request)
    {
        $request->validate([
            'name'          => 'required|min:2',
            'status'        => 'required',
            'jenis_kelamin' => 'required',
            'jabatan'       => 'required'
        ]);

        $id = $request->id;

        $kader = User::find($id);

        $kader->update([
            'name'          => $request->name,
            'status'        => $request->status,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan'       => $request->jabatan,
        ]);

        if ($kader) {
            toast("Data $kader->name Berhasil Di Edit ", 'success');
            return redirect()->route('index-kader');
        } else {
            toast("Data $kader->name Gagal Di Edit ", 'error');
            return redirect()->route('index-kader');
        }
    }
}
