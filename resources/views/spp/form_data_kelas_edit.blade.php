@extends('template.layout')

@section('konten')

{{-- Form --}}
<div class="pt-3 bg-dark mt-2">

</div>
<form action="{{url('kelas/'.$data->id)}}" method="POST">
@csrf
@method('PUT')
<div class="card mt-5 bg-dark shadow-sm">
    <div class="justify-content-start mt-4">
        <a href="{{url('kelas')}}" class="btn">
            <i class="ri-arrow-left-fill text-light" style="font-size: 24px"></i>
        </a>
    </div>
    <div class="my-3 p-3 bg-dark">
        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label text-light">Nama Kelas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" value="{{$data->nama_kelas}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kompetensi_keahlian" class="col-sm-2 col-form-label text-light">Kompetensi Keahlian</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="kompetensi_keahlian" id="kompetensi_keahlian" value="{{$data->kompetensi_keahlian}}">
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