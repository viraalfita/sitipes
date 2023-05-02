<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SITIPES - Sistem Pembayaran SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
  </head>
  <body class="bg-dark">
    <div class="container">
        <div class="bg-dark mt-5 p-5" style="border-radius: 1rem;">
            <div class="d-flex m-auto" style="width: 50vh">
            <div class="card-login bg-dark p-5 text-center m-auto">
                @include('component/message')
                <form action="/login" method="POST">
                @csrf
                <h2 class="fw-bold mb-2 text-uppercase text-white">Login</h2>
                <p class="text-white-50 mb-5">Masukkan username dan password</p>

                <div class="form-outline form-white mb-4">
                    <input type="text" id="username" name="username" class="form-control form-control-lg" />
                    <label class="form-label text-white" for="username">Username</label>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label text-white" for="password">Password</label>
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                </form>
            </div>
            </div>
        </div>
    </div>
  </body>
</html>