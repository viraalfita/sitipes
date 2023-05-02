@extends('template.layout')

@section('konten')

{{-- Form --}}
<div class="pt-3 bg-dark mt-2">
<input type="hidden" id="token" value="{{csrf_token()}}">
</div>
<form action="{{url('pembayaran')}}" method="POST">
@csrf
<div class="card mt-5 bg-dark shadow-sm">
    <div class="justify-content-start mt-4">
        <a href="{{url('pembayaran')}}" class="btn">
            <i class="ri-arrow-left-fill text-light" style="font-size: 24px"></i>
        </a>
    </div>
    <div class="my-3 p-3 bg-dark">
        <div class="mb-3 row">
            <label for="petugas" class="col-sm-2 col-form-label text-light">Petugas</label>
            <div class="col-sm-10">
                <select class="form-control" name='id_petugas' id="id_petugas">
                    @foreach ($data_petugas as $dat)
                    <option value="{{$dat->id}}">{{$dat->nama_petugas}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="siswa" class="col-sm-2 col-form-label text-light">Siswa</label>
            <div class="col-sm-10">
                <select class="form-control" name='nisn' id="nisn">
                    @foreach ($data_siswa as $dat)
                    <option value="{{$dat->nisn}}">{{$dat->nama_siswa}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tgl_bayar" class="col-sm-2 col-form-label text-light">Tanggal Bayar</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_bayar" id="tgl_bayar" value="{{Session::get('tgl_bayar')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bulan_dibayar" class="col-sm-2 col-form-label text-light">Bulan Dibayar</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="bulan_dibayar" id="bulan_dibayar" value="{{Session::get('bulan_dibayar')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun_dibayar" class="col-sm-2 col-form-label text-light">Tahun Dibayar</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tahun_dibayar" id="tahun_dibayar" value="{{Session::get('tahun_dibayar')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jumlah_bayar" class="col-sm-2 col-form-label text-light">Jumlah Bayar</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="jumlah_bayar" id="jumlah_bayar" value="{{Session::get('jumlah_bayar')}}">
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

<script>
    getNominal()
    $('#nisn').change(()=>{
        getNominal()
    })
    function getNominal() {
        $.ajax({
            url: "/get-nominal",
            method: "post",
            data: {
                _token: $('#token').val(),
                nisn: $('#nisn').val() ,
            },
    
            success: (result) => {
                console.log(result);
                result = result[0];
    
                $('#jumlah_bayar').val(result.nominal)
            },
            error: (err) => {console.log(err);}
        })
    }
</script>

@endsection