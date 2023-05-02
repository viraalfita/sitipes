<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\siswa;
use App\Models\spp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10 ;
        if (strlen($katakunci)) {
            $data = siswa::where('nama_siswa', 'like', "%$katakunci%")
                    ->orWhere('alamat', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else {
            $data = siswa::orderBy('nisn', 'desc')->paginate(10);
        }

        return view('spp.data_siswa')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_kelas = kelas::orderBy('id', 'desc')->get();
        $data_spp = spp::orderBy('id', 'desc')->get();
        $data_user = User::orderBy('id', 'desc')->get();

        return view('spp.form_data_siswa')->with([
            'data_kelas'=> $data_kelas,
            'data_spp'=> $data_spp,
            'data_user' => $data_user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nisn', $request->nisn);
        Session::flash('nis', $request->nis);
        Session::flash('nama_siswa', $request->nama_siswa);
        Session::flash('alamat', $request->alamat);
        Session::flash('no_telp', $request->no_telp);

        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama_siswa' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
            'id_users' => 'required',
        ],[
            'nisn.required' => 'NISN wajib diisi',
            'nis.required' => 'NIS wajib diisi',
            'nama_siswa.required' => 'Nama Siswa wajib diisi',
            'id_kelas.required' => 'Kelas wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'no_telp.required' => 'No Telp wajib diisi',
            'id_users.required' => 'SPP wajib diisi',
            'id_spp.required' => 'SPP wajib diisi',
        ]);
        $data = [
            'nisn' =>$request->nisn,
            'nis' =>$request->nis,
            'nama_siswa' =>$request->nama_siswa,
            'id_kelas' =>$request->id_kelas,
            'alamat' =>$request->alamat,
            'no_telp' =>$request->no_telp,
            'id_users' =>$request->id_users,
            'id_spp' =>$request->id_spp,
        ];

        siswa::create($data);
        return redirect()->to('siswa')->with('success', 'Data berhasil tersimpan');
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
        $data = siswa::where('nisn',$id)->first();
        $data_kelas = kelas::orderBy('id', 'desc')->get();
        $data_spp = spp::orderBy('id', 'desc')->get();
        $data_user = User::orderBy('id', 'desc')->get();

        return view('spp.form_data_siswa_edit')->with([
            'data' => $data,
            'data_kelas'=> $data_kelas,
            'data_spp'=> $data_spp,
            'data_user' => $data_user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama_siswa' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ],[
            'nisn.required' => 'NISN wajib diisi',
            'nis.required' => 'NIS wajib diisi',
            'nama_siswa.required' => 'Nama Siswa wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'no_telp.required' => 'No Telp wajib diisi',
        ]);
        $data = [
            'nisn' =>$request->nisn,
            'nis' =>$request->nis,
            'nama_siswa' =>$request->nama_siswa,
            'id_kelas' =>$request->id_kelas,
            'alamat' =>$request->alamat,
            'no_telp' =>$request->no_telp,
            'id_spp' =>$request->id_spp,
            'id_users' =>$request->id_users,
        ];

        siswa::where('nisn', $id)->update($data);
        return redirect()->to('siswa')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('nisn', $id)->delete();
        return redirect()->to('siswa')->with('success', 'Data berhasil terhapus');
    }
}
