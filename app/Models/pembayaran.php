<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $fillable = ['nisn', 'id_petugas', 'tgl_bayar', 'bulan_dibayar', 'tahun_dibayar', 'jumlah_bayar', 'id_spp'];
    protected $table = 'pembayaran';
}
