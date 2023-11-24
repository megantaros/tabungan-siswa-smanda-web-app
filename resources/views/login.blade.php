<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>LOGIN - SMANDA STUDENT BANK</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{ asset('template/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('template/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Poppins:wght@400;600&family=Viga&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid bg-gradient-light min-vh-100 d-flex justify-content-center align-items-center">
        <div data-aos="fade-up" class="row w-lg-75 w-100 hadow-lg overflow-hidden" style="border-radius: 12px;">
            <div class="col-lg-6 col-12 bg-gradient-primary py-5 p-0">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 text-center">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo Instansi" class="mb-3" style="max-height: 10rem;">
                        <h5 class="text-light mb-0" style="font-family: 'Viga', sans-serif;" >Selamat Datang di</h5>
                        <p class="text-sm text-light" style="font-family: 'Poppins', sans-serif;">Aplikasi Tabungan Siswa SMANDA</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 bg-white py-4 px-3">
                <form action="{{ route('attempt') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible text-white my-2">
                        <div class="text-sm d-flex justify-content-start align-items-center">
                            <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                            <strong class="me-1">{{ Session::get('error') }}</strong>
                        </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="mb-1">Email</label>
                        <input type="text" class="form-control form-control-sm rounded bg-light px-3 py-2 text-dark font-weight-bold" placeholder="Email" name="email" style="font-family: 'Poppins', sans-serif;">
                        <label class="mb-1">Password</label>
                        <input type="password" class="form-control form-control-sm rounded bg-light px-3 py-2 text-dark font-weight-bold" placeholder="Password" name="password" style="font-family: 'Poppins', sans-serif;">
                    </div>
                    <button type="submit" class="btn bg-gradient-primary mt-5 btn-sm w-100 px-4 text-center font-weight-normal py-2">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 2000,
        });
    </script>
  </body>
</html>