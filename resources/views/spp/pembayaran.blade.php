@extends('template.layout')

@section('konten')

<div class="container">
    <div class="pt-3 mt-5">

    </div>
    <div class="card rounded shadow-sm bg-gray">
        <div class="card-header">
            <h1 class="text-gray">Transaksi Pembayaran SPP</h1>
        </div>
        <div class="card-body">
            <div class="my-2 p-3 bg-dark rounded">
                {{-- Pencarian --}}
                <div class="pb-3">
                    <form action="{{url('pembayaran')}}" class="d-flex" method="get">
                        <input type="search" class="form-control me-1" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                        <button class="btn btn-transparent" type="submit">
                            <i class="ri-search-2-line text-primary" style=""></i>
                        </button>
                    </form>
                </div>

                {{-- Tambah Data --}}
                {{-- <div class="pb-3">
                    <a href="{{url('pembayaran/create')}}" class="btn btn-transparent border-secondary text-gray">+ Tambah Data</a>
                </div> --}}
    
                <table class="table table-dark table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="col-md-1 text-center">No</th>
                            <th class="col-md-1 text-center">NISN</th>
                            <th class="col-md-1 text-center">Tanggal Bayar</th>
                            <th class="col-md-2 text-center">Bulan</th>
                            <th class="col-md-2 text-center">Tahun</th>
                            <th class="col-md-2 text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomer = 1; ?>
                        @foreach ($data as $dat)
                        <tr>
                            <td>{{$nomer++}}</td>
                            <td>{{$dat->nisn}}</td>
                            <td>{{$dat->tgl_bayar}}</td>
                            <td>{{$dat->bulan_dibayar}}</td>
                            <td>{{$dat->tahun_dibayar}}</td>
                            <td>{{$dat->jumlah_bayar}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
@foreach ($data as $dat)   
<div class="modal fade" id="modalDelete_{{$dat->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Peringatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda yakin akan menghapus data?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <form action="{{url('pembayaran/'.$dat->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark text-light">Ya</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endforeach


@endsection
