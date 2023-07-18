@extends('layouts.admin')

@section('users')
active bg-gradient-info
@endsection

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users Admin</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Users Admin</h6>
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
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-12 d-flex">
        <form action="{{ route('admin.users') }}" method="GET" enctype="multipart/form-data" class="me-2">
        @csrf
        @method('GET')
        <input type="text" class="form-control border-outline bg-white px-3 w-100 h-75" placeholder="Cari username..." name="search">
        </form>
        <a href="{{ route('admin.add.admin') }}" class="btn bg-gradient-success me-2 d-flex">
          <div class="text-white">
            <i class="material-icons opacity-10">person_add</i>
          </div>
          <span class="nav-link-text ms-1">Tambah Admin</span>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 text-center">Tabel Users Admin</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr class="text-center">
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder">No</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder">Email</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder">Username</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder">Nama</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  @foreach($data as $admin)
                  <tr class="text-secondary text-sm font-weight-bolder opacity-8">
                      <td class="text-center">{{ $no++ }}</td>
                      <td class="text-center">{{ $admin->email }}</td>
                      <td class="text-center">{{ $admin->username }}</td>
                      <td class="text-uppercase">{{ $admin->nama_admin }}</td>
                      <td class="text-center">
                          <a href="{{ route('admin.get.admin', ['id_admin' => $admin->id_admin]) }}" class="btn bg-gradient-info">
                            <div class="text-white text-center d-flex align-items-center justify-content-center">
                              <i class="material-icons opacity-10">info</i>
                            </div>
                            <span class="nav-link-text ms-1">Detail</span>
                          </a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection