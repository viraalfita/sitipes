<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10 ;
        if (strlen($katakunci)) {
            $data = kelas::where('nama_kelas', 'like', "%$katakunci%")
                    ->orWhere('kompetensi_keahlian', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else {
            $data = kelas::orderBy('id', 'desc')->paginate(10);
        }

        return view('spp.data_kelas')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spp.form_data_kelas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_kelas', $request->nama_kelas);
        Session::flash('kompetensi_keahlian', $request->kompetensi_keahlian);

        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ],[
            'nama_kelas.required' => 'Nama kelas wajib diisi',
            'kompetensi_keahlian.required' => 'Kompetensi_keahlian wajib diisi',
        ]);
        $data = [
            'nama_kelas' =>$request->nama_kelas,
            'kompetensi_keahlian' =>$request->kompetensi_keahlian,
        ];

        kelas::create($data);
        return redirect()->to('kelas')->with('success', 'Data berhasil tersimpan');
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
        $data = kelas::where('id',$id)->first();
        return view('spp.form_data_kelas_edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ],[
            'nama_kelas.required' => 'Nama kelas wajib diisi',
            'kompetensi_keahlian.required' => 'Kompetensi_keahlian wajib diisi',
        ]);
        $data = [
            'nama_kelas' =>$request->nama_kelas,
            'kompetensi_keahlian' =>$request->kompetensi_keahlian,
        ];

        kelas::where('id', $id)->update($data);
        return redirect()->to('kelas')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kelas::where('id', $id)->delete();
        return redirect()->to('kelas')->with('success', 'Data berhasil terhapus');
    }
}
