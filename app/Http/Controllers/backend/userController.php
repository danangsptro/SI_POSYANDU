<?php

namespace App\Http\Controllers\backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Exception;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('backend.user.index', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'status' => 'required',
                'jenis_kelamin'  => 'required',
                'jabatan' => 'required',
                'password' => ''
            ])->validate();

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->status = $request->status;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->jabatan = $request->jabatan;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect('dashboard/user')->with([
                $result['status']   = true,
                $result['message']  = "Data Successfully Added"
            ]);
        } catch (Exception $e) {
            $message = $e->getMessage();
            return redirect('dashboard/user')->with([
                $result['status']   = false,
                $result['message']  = $message
            ]);
        }
    }

    // public function store(Request $request)
    // {
    //     $validate = $request->validate([
    //         'name'          => 'required|min:2',
    //         'email'         => 'required|unique:users,email',
    //         'status'        => 'required|min:2',
    //         'jenis_kelamin' => 'required',
    //         'jabatan'       => 'required|min:2',
    //         'password'      => 'required|min:6'
    //     ]);

    //     $user                = new User();
    //     $user->name          = $validate['name'];
    //     $user->email         = $validate['email'];
    //     $user->status        = $validate['status'];
    //     $user->jenis_kelamin = $validate['jenis_kelamin'];
    //     $user->jabatan       = $validate['jabatan'];
    //     $user->password      = Hash::make($validate['password']);
    //     dd($user);
    //     $user->save();

    //     if ($user) {
    //         toast("Data $user->name Berhasil Di Edit ", 'success');
    //         return redirect('dashboard/user');
    //     } else {
    //         toast("Data $user->name Gagal Di Edit ", 'error');
    //         return redirect('dashboard/user');
    //     }
    // }
}
