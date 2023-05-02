<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nama_siswa', 'nis', 'nisn', 'alamat', 'no_telp', 'id_kelas', 'id_spp', 'id_users'];
    protected $table = 'siswa';
}
