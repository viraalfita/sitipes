<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Models\petugas;
use App\Models\siswa;
use App\Models\spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10 ;
        if (strlen($katakunci)) {
            $data = pembayaran::where('nisn', 'like', "%$katakunci%")
                    ->orWhere('tgl_bayar', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else {
            $data = pembayaran::orderBy('id', 'desc')->paginate(10);
        }

        return view('spp.pembayaran')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_petugas = petugas::orderBy('id', 'desc')->get();
        $data_siswa = siswa::orderBy('nisn', 'desc')->get();

        return view('spp.form_pembayaran')->with([
            'data_petugas' => $data_petugas,
            'data_siswa' => $data_siswa,
        ]);
    }

    public function getNominal(Request $request)
    {
        $nisn = $request->nisn;
        $nominal = DB::table('siswa')
                    ->join('spp', 'siswa.id_spp', '=', 'spp.id')
                    ->select('*')->where('nisn', $nisn)
                    ->get();

        return response($nominal, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_petugas' => 'required',
            'nisn' => 'required',
            'tgl_bayar' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'jumlah_bayar' => 'required',
        ],[
            'id_petugas.required' => 'Petugas wajib diisi',
            'nisn.required' => 'NISN wajib diisi',
            'tgl_bayar.required' => 'Tanggal bayar wajib diisi',
            'bulan_dibayar.required' => 'Bulan dibayar wajib diisi',
            'tahun_dibayar.required' => 'Tahun dibayar wajib diisi',
            'jumlah_bayar.required' => 'Jumlah bayar wajib diisi',
        ]);

        $id_spp = siswa::where('nisn', $request->nisn)->get();
        
        $data = [
            'id_petugas' =>$request->id_petugas,
            'nisn' =>$request->nisn,
            'tgl_bayar' =>$request->tgl_bayar,
            'bulan_dibayar' =>$request->bulan_dibayar,
            'tahun_dibayar' =>$request->tahun_dibayar,
            'id_spp' =>$id_spp[0]->id_spp,
            'jumlah_bayar' =>$request->jumlah_bayar,
        ];

        pembayaran::create($data);
        return redirect()->to('pembayaran')->with('success', 'Data berhasil tersimpan');
    }

}
