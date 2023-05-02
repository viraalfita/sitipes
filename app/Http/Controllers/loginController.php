<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('spp.login');
    }

    public function login(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            //sukses
            return redirect('/dashboard');
        }else {
            return redirect('/')->withErrors('username atau password yang anda masukkan tidak valid');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('spp.daftar_akun');
    }

    public function create(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required | unique:users',
            'password' => 'required | min:6',
        ],[
            'username.unique' => 'Username sudah pernah digunakan',
            'password.min' => 'Minimal password 6 karakter',
        ]);

        $data = [
            'username' =>$request->username,
            'password' => Hash::make($request->password),
            'level' =>$request->level,
        ];
        User::create($data);

        return redirect()->to('dashboard')->with('success', 'Data berhasil tersimpan');

    }
}
