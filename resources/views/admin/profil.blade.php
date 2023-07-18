@extends('layouts.admin')

@section('profil')
active bg-gradient-info
@endsection

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profil</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Profil</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            {{-- <div class="input-group input-group-outline">
            <label class="form-label">Type here...</label>
            <input type="text" class="form-control">
            </div> --}}
        </div>
        <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                </div>
            </a>
            </li>
            <li class="nav-item d-flex align-items-center">
                <a href="{{ route('admin.profil') }}" class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">Hi, {{ Auth::guard('admin')->user()->nama_admin }}</span>
                </a>
            </li>
        </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<!-- Modal -->
<div class="modal fade" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('update.profil') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="my-1">
                    <label>Nama Admin</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" value="{{ Auth::guard('admin')->user()->nama_admin }}" name="nama_admin">
                </div>
                <div class="my-1">
                    <label>Email</label>
                    <input type="email" class="form-control bg-light rounded border px-3 fw-bold" value="{{ Auth::guard('admin')->user()->email }}" name="email">
                </div>
                <div class="my-1">
                    <label>Username</label>
                    <input type="username" class="form-control bg-light rounded border px-3 fw-bold" value="{{ Auth::guard('admin')->user()->username }}" name="username">
                </div>
                <div class="my-1">
                    <label>Password</label>
                    <input type="password" class="form-control bg-light rounded border px-3 fw-bold" name="password" placeholder="Opsional, diisi jika ada perubahan password">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn bg-gradient-dark shadow-0" data-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-gradient-success shadow-0">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="container-fluid px-2 px-md-4">
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible text-white">
        <div class="text-sm d-flex justify-content-start align-items-center">
            <i class="material-icons me-2" style="font-size: 26px;">check_circle</i>
            <strong>{{ Session::get('success') }}</strong>
        </div>
    </div>
    @endif
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
    @if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible text-white my-2">
            <div class="text-sm d-flex justify-content-start align-items-center">
                <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                <strong class="me-1">{{ $error }}</strong>
            </div>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endforeach
    @endif
    <div class="page-header min-height-400 border-radius-xl mt-4" style="background-image: url('{{ asset('assets/bg-sekolah.jpg') }}'); background-size: cover;">
      <span class="mask bg-gradient-primary opacity-5"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="{{ asset('assets/pp.png') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm bg-gradient-info">
            </div>
            </div>
            <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                {{ Auth::guard('admin')->user()->nama_admin }}
                </h5>
                <p class="mb-0 font-weight-normal text-sm">
                Admin
                </p>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Profile Information</h6>
                        </div>
                        <button type="button" class="col-md-4 text-end bg-transparent border-0" data-toggle="modal" data-target="#editProfil">
                            <a href="javascript:;">
                            <a class="fas fa-user-edit text-secondary text-sm" title="Edit Profile"></a>
                            </a>
                        </button>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm">
                        Hi, I’m {{ Auth::guard('admin')->user()->nama_admin }}, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Username:</strong> &nbsp; {{ Auth::guard('admin')->user()->username }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nama Admin:</strong> &nbsp; {{ Auth::guard('admin')->user()->nama_admin }}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ Auth::guard('admin')->user()->email }}</li>
                        {{-- <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; USA</li> --}}
                        <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">Social:</strong> &nbsp;
                            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-instagram fa-lg"></i>
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection