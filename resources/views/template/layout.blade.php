<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SITIPES - SMKN 4 Malang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
  </head> 
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="row navbar-brand" href="{{url('/dashboard')}}">
        <span class="col"><strong>SITIPES</strong></span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li>
              <h4 class="text-center">SPP SMKN 4 Malang</h4>
            </li>
            <li>
              <hr class="mb-0">
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex" aria-current="page" href="{{url('/dashboard')}}">
                <i class="ri-home-3-line" style="font-size: 24px"></i>
                <span class="my-auto mx-3">Dashboard</span>
              </a>
            </li>
            @if (auth()->user()->level == "admin")
              <li>
                <hr class="mt-0 mb-0">
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex" aria-current="page" href="{{url('/register')}}">
                  <i class="ri-user-add-line" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">Daftar Akun</span>
                </a>
              </li>
              <li>
                <hr class="mt-0 mb-0">
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex" aria-current="page" href="{{url('/siswa')}}">
                  <i class="ri-user-line" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">Data Siswa</span>
                </a>
              </li>
              <li>
                <hr class="mt-0 mb-0">
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex" aria-current="page" href="{{url('/petugas')}}">
                  <i class="ri-user-2-line" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">Data Petugas</span>
                </a>
              </li>
              <li>
                <hr class="mt-0 mb-0">
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex" aria-current="page" href="{{url('/kelas')}}">
                  <i class="ri-list-unordered" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">Data Kelas</span>
                </a>
              </li>
              <li>
                <hr class="mt-0 mb-0">
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex" aria-current="page" href="{{url('/spp')}}">
                  <i class="ri-file-list-3-line" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">Data SPP</span>
                </a>
              </li>
              <li>
                <hr class="mb-0 mt-0">
              </li>
              <li>
                <a class="nav-link d-flex" href="{{url('/pembayaran/create')}}">
                  <i class="ri-checkbox-multiple-line" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">Entri Transaksi Pembayaran</span>
                </a>
              </li>
              <li>
                <hr class="mt-0 mb-0">
              </li>
              <li>
                <a class="nav-link d-flex" href="{{url('/pembayaran')}}">
                  <i class="ri-history-line" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">History Pembayaran</span>
                </a>
              </li>
            @endif
            
            @if (auth()->user()->level == "petugas")
              <li>
                <hr class="mb-0 mt-0">
              </li>
              <li>
                <a class="nav-link d-flex" href="{{url('/pembayaran/create')}}">
                  <i class="ri-checkbox-multiple-line" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">Entri Transaksi Pembayaran</span>
                </a>
              </li>
              <li>
                <hr class="mt-0 mb-0">
              </li>
              <li>
                <a class="nav-link d-flex" href="{{url('/pembayaran')}}">
                  <i class="ri-history-line" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">History Pembayaran</span>
                </a>
              </li>
            @endif

            @if (auth()->user()->level == "siswa")
              <li>
                <hr class="mt-0 mb-0">
              </li>
              <li>
                <a class="nav-link d-flex" href="{{url('/pembayaran')}}">
                  <i class="ri-history-line" style="font-size: 24px"></i>
                  <span class="my-auto mx-3">History Pembayaran</span>
                </a>
              </li>
            @endif
            
            <li>
              <hr class="mt-0 mb-0">
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex" href="{{url('/logout')}}">
                <i class="ri-logout-box-r-line" style="font-size: 24px"></i>
                <span class="my-auto mx-3">Logout</span>
              </a>
            </li>
            <li>
              <hr class="mt-0 mb-0">
            </li>
        </div>
      </div>
    </div>
  </nav>
  <body class="bg-dark">
    <main class="container">
        @include('component/message')
        @yield('konten')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
  <div class="d-flex flex-column h-100 bg-dark">
    <!-- FOOTER -->
    <footer class="w-100 py-4 flex-shrink-0">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-5 col-md-6">
                    <h5 class="text-white mb-3">HUBUNGI KAMI</h5>
                    <ul class="list-unstyled text-muted">
                        <li>
                          <a href="https://www.instagram.com/solikain_/" class="d-flex text-decoration-none text-secondary">
                            <i class="ri-instagram-line" style="font-size: 24px"></i>
                            <span class="my-auto mx-3">@smkn4malang</span>
                          </a>
                        </li>
                        <li>
                          <a class="d-flex text-decoration-none text-secondary">
                            <i class="ri-whatsapp-line" style="font-size: 24px"></i>
                            <span class="my-auto mx-3">(0341) 876257</span>
                          </a>
                        </li>
                        <li>
                          <a class="d-flex text-decoration-none text-secondary">
                            <i class="ri-map-pin-line" style="font-size : 24px"></i>
                            <span class="my-auto mx-3">Jl. Tanimbar No.22</span>
                          </a>
                        </li>
                        <li>
                          <a class="d-flex text-decoration-none text-secondary">
                            <i class="ri-mail-open-line" style="font-size : 24px"></i>
                            <span class="my-auto mx-3">smkn4mlg@gmail.com</span>
                          </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <p class="text-secondary">Copyright SITIPES © 2023. All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
    </footer>
</div>
</html>