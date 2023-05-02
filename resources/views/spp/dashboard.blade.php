@extends('template.layout')

@section('konten')

<div class="container my-3 p-5 bg-dark">
  <div class="d-flex" style="height: 90vh">
    <div class="text-center m-auto p-5 bg-dark">
        <img src="{{url('assets/logo-grafika.png')}}" alt="..." class="animate__animated animate__fadeInDown">
        <h1 class="display-2 text-light animate__animated animate__fadeInDown"><strong>SISTEM PEMBAYARAN SPP</strong></h1>
        <h1 class="display-3 text-light animate__animated animate__fadeInUp">SMK NEGERI 4 MALANG</h1>
    </div>
  </div>
</div>

<div class="bg-secondary" data-aos="fade-right">
    <hr>
</div>

<div class="container">
  <div id="carouselAutoplaying" data-aos="fade-right" class="carousel slide bg-dark p-5 d-flex" style="height: 90vh" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{url('assets/sitipes.jpeg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{url('assets/sitipes1.jpg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{url('assets/sitipes2.jpg')}}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="bg-secondary" data-aos="fade-left">
  <hr>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100 bg-transparent" data-aos="fade-left">
        <img src="{{url('assets/lebihmodern.svg')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-light text-center">Sistem Modern</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 bg-transparent" data-aos="fade-left">
        <img src="{{url('assets/antiredudansi.svg')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-light text-center">Anti Redudansi Data</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 bg-transparent" data-aos="fade-left">
        <img src="{{url('assets/lebihcepat.svg')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-light text-center">Lebih Cepat dan Mudah</h5>
        </div>
      </div>
    </div>
</div>

<div class="bg-secondary" data-aos="fade-left">
    <hr>
</div>

<script src="{{url('js/script.js')}}"></script>

@endsection