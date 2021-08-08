<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
        $adminId = Auth::user()->id;

        $request->validate([
            'name'          => 'required|min:2',
            'status'        => 'required',
            'jenis_kelamin' => 'required',
            'jabatan'       => 'required'
        ]);

        $name           = $request->name;
        $status         = $request->status;
        $jenis_kelamin  = $request->jenis_kelamin;
        $jabatan        = $request->jabatan;

        $kader = User::where('id', $adminId)->update([
            'name'          => $name,
            'status'        => $status,
            'jenis_kelamin' => $jenis_kelamin,
            'jabatan'       => $jabatan
        ]);

        if ($kader) {
            toast("Data Berhasil Di Edit ", 'success');
            return redirect()->route('index-kader');
        } else {
            toast("Data Berhasil Di Edit ", 'success');
            return redirect()->route('index-kader');
        }
    }
}
