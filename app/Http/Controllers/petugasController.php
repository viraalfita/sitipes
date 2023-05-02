<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10 ;
        if (strlen($katakunci)) {
            $data = petugas::where('nama_petugas', 'like', "%$katakunci%")
                    ->orWhere('level', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else {
            $data = petugas::orderBy('id', 'desc')->paginate(10);
        }

        return view('spp.data_petugas')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_user = User::orderBy('id', 'desc')->get();
        return view('spp.form_data_petugas')->with('data_user', $data_user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_petugas', $request->nama_petugas);

        $request->validate([
            'nama_petugas' => 'required',
        ],[
            'nama_petugas.required' => 'Nama petugas wajib diisi',
        ]);
        $data = [
            'nama_petugas' =>$request->nama_petugas,
            'id_users' =>$request->id_users,
        ];

        petugas::create($data);
        return redirect()->to('petugas')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = petugas::where('id',$id)->first();
        $data_user = User::orderBy('id', 'desc')->get();
        return view('spp.form_data_petugas_edit')->with([
            'data'=> $data,
            'data_user' => $data_user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'level' => 'required',
        ],[
            'nama_petugas.required' => 'Nama petugas wajib diisi',
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'level.required' => 'Level wajib diisi',
        ]);
        $data = [
            'nama_petugas' =>$request->nama_petugas,
            'level' =>$request->level,
            'username' =>$request->username,
            'password' => Hash::make($request->password)
        ];

        petugas::where('id', $id)->update($data);
        return redirect()->to('petugas')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        petugas::where('id', $id)->delete();
        return redirect()->to('petugas')->with('success', 'Data berhasil terhapus');
    }
}
