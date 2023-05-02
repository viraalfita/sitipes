@extends('template.layout')

@section('konten')

{{-- Form --}}
<div class="pt-3 bg-dark mt-2">

</div>
<form action="{{url('siswa')}}" method="POST">
@csrf
<div class="card mt-5 bg-dark shadow-sm">
    <div class="justify-content-start mt-4">
        <a href="{{url('siswa')}}" class="btn">
            <i class="ri-arrow-left-fill text-light" style="font-size: 24px"></i>
        </a>
    </div>
    <div class="my-3 p-3 bg-dark">
        <div class="mb-3 row">
            <label for="nisn" class="col-sm-2 col-form-label text-light">NISN</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nisn" id="nisn" value="{{Session::get('nisn')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label text-light">NIS</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nis" id="nis" value="{{Session::get('nis')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_siswa" class="col-sm-2 col-form-label text-light">Nama Siswa</label>
            <div class="col-sm-10">
                <input type="nama_siswa" class="form-control" name="nama_siswa" id="nama_siswa" value="{{Session::get('nama_siswa')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label text-light">Kelas</label>
            <div class="col-sm-10">
                <select class="form-control" name='id_kelas' id="id_kelas">
                    @foreach ($data_kelas as $dat)
                    <option value="{{$dat->id}}">{{$dat->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label text-light">Alamat</label>
            <div class="col-sm-10">
                <input type="alamat" class="form-control" name="alamat" id="alamat" value="{{Session::get('alamat')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_telp" class="col-sm-2 col-form-label text-light">No Telp</label>
            <div class="col-sm-10">
                <input type="no_telp" class="form-control" name="no_telp" id="no_telp" value="{{Session::get('no_telp')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="spp" class="col-sm-2 col-form-label text-light">SPP</label>
            <div class="col-sm-10">
                <select class="form-control" name='id_spp' id="id_spp">
                    @foreach ($data_spp as $dat)
                    <option value="{{$dat->id}}">{{$dat->tahun}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="user" class="col-sm-2 col-form-label text-light">Akun</label>
            <div class="col-sm-10">
                <select class="form-control" name='id_users' id="id_users">
                    @foreach ($data_user as $dat)
                    <option value="{{$dat->id}}">{{$dat->username}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-secondary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</div>
</form>

@endsection