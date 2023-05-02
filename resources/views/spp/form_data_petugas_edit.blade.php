@extends('template.layout')

@section('konten')

{{-- Form --}}
<div class="pt-3 bg-dark mt-2">

</div>
<form action="{{url('petugas/'.$data->id)}}" method="POST">
@csrf
@method('PUT')
<div class="card mt-5 bg-dark shadow-sm">
    <div class="justify-content-start mt-4">
        <a href="{{url('petugas')}}" class="btn">
            <i class="ri-arrow-left-fill text-light" style="font-size: 24px"></i>
        </a>
    </div>
    <div class="my-3 p-3 bg-dark">
        <div class="mb-3 row">
            <label for="petugas" class="col-sm-2 col-form-label text-light">Nama Petugas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" value="{{$data->nama_petugas}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="user" class="col-sm-2 col-form-label text-light">Akun</label>
            <div class="col-sm-10">
                <select class="form-control" name='id_user' id="id_user">
                    @foreach ($data_user as $dat)
                    <option value="{{$dat->id}}" {{$dat->id == $data->id_users ?'selected' :''}}>{{$dat->username}}</option>
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