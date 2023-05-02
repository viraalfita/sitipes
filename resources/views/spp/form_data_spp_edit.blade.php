@extends('template.layout')

@section('konten')

{{-- Form --}}
<div class="pt-3 bg-dark mt-2">

</div>
<form action="{{url('spp/'.$data->id)}}" method="POST">
@csrf
@method('put')
<div class="card mt-5 bg-dark shadow-sm">
    <div class="justify-content-start mt-4">
        <a href="{{url('spp')}}" class="btn">
            <i class="ri-arrow-left-fill text-light" style="font-size: 24px"></i>
        </a>
    </div>
    <div class="my-3 p-3 bg-dark">
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label text-light">Tahun</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tahun" id="tahun" value="{{$data->tahun}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nominal" class="col-sm-2 col-form-label text-light">Nominal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nominal" id="nominal" value="{{$data->nominal}}">
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