<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\jenis_vitamin;
use Illuminate\Http\Request;

class jenisVitaminController extends Controller
{
    public function index()
    {
        $data = jenis_vitamin::all();
        return view('backend.jenisVitamin.index', compact('data'));
    }

    public function create()
    {
        return view('backend.jenisVitamin.create-jenisVitamin');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'vitamin'   => 'required|min:5'
        ]);

        $jenisVitamin           = new jenis_vitamin();
        $jenisVitamin->vitamin  = $validate['vitamin'];
        $jenisVitamin->save();

        if ($jenisVitamin) {
            toast("Data $jenisVitamin->vitamin Berhasil Di Tambahkan ", 'success');
            return redirect()->route('index-jenisVitamin');
        } else {
            toast("Data $jenisVitamin->vitamin Gagal Di Tambahkan ", 'error');
            return redirect()->route('index-jenisVitamin');
        }
    }

    public function edit($id)
    {
        $jenisVitamin = jenis_vitamin::find($id);
        return view('backend.jenisVitamin.edit-jenisVitamin', compact('jenisVitamin'));
    }

    public function update (Request $request)
    {
        $request->validate([
            'vitamin'   => 'required|min:5'
        ]);

        $id = $request->id;

        $jenis_vitamin = jenis_vitamin::find($id);

        $jenis_vitamin->update([
            'vitamin'   => $request->vitamin
        ]);
        $jenis_vitamin->save();

        if ($jenis_vitamin) {
            toast("Data $jenis_vitamin->vitamin Berhasil Di Edit ", 'success');
            return redirect()->route('index-jenisVitamin');
        } else {
            toast("Data $jenis_vitamin->vitamin Gagal Di Edit ", 'error');
            return redirect()->route('index-jenisVitamin');
        }
    }

    public function delete(jenis_vitamin $jenisVitamin)
    {
        $jenisVitamin->delete();

        if ($jenisVitamin) {
            toast("Data $jenisVitamin->vitamin Berhasil Di Hapus ", 'success');
            return redirect()->back();
        } else {
            toast("Data $jenisVitamin->vitamin Gagal Di Hapus ", 'error');
            return redirect()->back();
        }
    }
}
