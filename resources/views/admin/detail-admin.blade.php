@extends('layouts.admin')

@section('detail-admin')
active bg-gradient-info
@endsection

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Admin</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Detail Admin</h6>
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
<div class="container-fluid py-4">
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible text-white">
        <div class="text-sm d-flex justify-content-start align-items-center">
            <i class="material-icons me-2" style="font-size: 26px;">check_circle</i>
            <strong>{{ Session::get('success') }}</strong>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 text-center">Detail Admin</h6>
              </div>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('update.admin', ['id_admin' => $data->id_admin]) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                    <div class="my-1">
                        <label for="">Username</label>
                        <select name="username" class="form-control bg-light rounded border px-3 fw-bold text-uppercase">
                            <option value="{{ $data->username }}">{{ $data->username }}</option>
                            <option value="admin">Admin</option>
                            <option value="bendahara">Bendahara</option>
                        </select>
                    </div>
                    @error('username')
                    <div class="alert alert-danger alert-dismissible text-white my-2">
                        <div class="text-sm d-flex justify-content-start align-items-center">
                            <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                            <strong class="me-1">Username tidak boleh kosong!</strong>
                        </div>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    <div class="my-1">
                        <label for="">Nama Admin</label>
                        <input type="text" class="form-control bg-light rounded border px-3 fw-bold" name="nama_admin" value="{{ $data->nama_admin }}">
                    </div>
                    @error('nama_admin')
                    <div class="alert alert-danger alert-dismissible text-white my-2">
                        <div class="text-sm d-flex justify-content-start align-items-center">
                            <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                            <strong class="me-1">Nama Admin tidak boleh kosong!</strong>
                        </div>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    <div class="my-1">
                        <label for="">Email</label>
                        <input type="email" class="form-control bg-light rounded border px-3 fw-bold" name="email" value="{{ $data->email }}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger alert-dismissible text-white my-2">
                        <div class="text-sm d-flex justify-content-start align-items-center">
                            <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                            <strong class="me-1">Email tidak boleh kosong!</strong>
                        </div>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    <div class="my-1">
                        <label for="">Password</label>
                        <input type="text" class="form-control bg-light rounded border px-3 fw-bold" name="password" placeholder="Opsional, diisi jika ada perubahan password">
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit"class="btn bg-gradient-warning mt-3 px-5" onclick="return confirm('Edit Data Admin?')">
                            <div class="text-white">
                                <i class="material-icons opacity-10">edit</i>
                            </div>
                            <span class="nav-link-text ms-1">Edit Admin</span>
                        </button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection