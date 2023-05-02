<?php

namespace App\Http\Controllers;

use App\Models\spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class sppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10 ;
        if (strlen($katakunci)) {
            $data = spp::where('tahun', 'like', "%$katakunci%")
                    ->orWhere('nominal', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else {
            $data = spp::orderBy('id', 'desc')->paginate(10);
        }

        return view('spp.data_spp')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spp.form_data_spp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('tahun', $request->tahun);
        Session::flash('nominal', $request->nominal);

        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ],[
            'tahun.required' => 'Tahun wajib diisi',
            'nominal.required' => 'Nominal wajib diisi',
        ]);
        $data = [
            'tahun' =>$request->tahun,
            'nominal' =>$request->nominal,
        ];

        spp::create($data);
        return redirect()->to('spp')->with('success', 'Data berhasil tersimpan');
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
        $data = spp::where('id',$id)->first();
        return view('spp.form_data_spp_edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ],[
            'tahun.required' => 'Tahun wajib diisi',
            'nominal.required' => 'Nominal wajib diisi',
        ]);
        $data = [
            'tahun' =>$request->tahun,
            'nominal' =>$request->nominal,
        ];

        spp::where('id', $id)->update($data);
        return redirect()->to('spp')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        spp::where('id', $id)->delete();
        return redirect()->to('spp')->with('success', 'Data berhasil terhapus');
    }
}
