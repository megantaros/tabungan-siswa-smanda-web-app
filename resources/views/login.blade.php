<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>LOGIN - MANUNGGAL MONEY CARE</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{ asset('template/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('template/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
  </head>
  <body>
    <div class="container-fluid min-vh-100 bg-gradient-light d-flex justify-content-center align-items-center">
        <div class="row shadow-lg">
            <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center bg-gradient-info">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Instansi" class="w-50">
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
                        <input type="text" class="form-control form-control-sm rounded bg-light px-3 py-2" placeholder="Username" name="email">
                        <label class="mb-1">Password</label>
                        <input type="password" class="form-control form-control-sm rounded bg-light px-3 py-2" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn bg-gradient-success mt-5 btn-sm px-4 d-flex">
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
  </body>
</html>