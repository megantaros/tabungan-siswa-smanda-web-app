@extends('layouts.admin')

@section('detail-transaksi')
active bg-gradient-info
@endsection

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Transaksi</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Transaksi</h6>
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
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible text-white">
        <div class="text-sm d-flex justify-content-start align-items-center">
            <i class="material-icons me-2" style="font-size: 26px;">check_circle</i>
            <strong>{{ Session::get('success') }}</strong>
        </div>
    </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible text-white">
        <div class="text-sm d-flex justify-content-start align-items-center">
            <i class="material-icons me-2" style="font-size: 26px;">error</i>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 text-center">Detail Transaksi</h6>
              </div>
            </div>
            <div class="card-body p-4">
                <div class="my-1">
                    <label for="">NIS</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" value="{{ $data->nis }}" disabled>
                    {{-- <select class="form-control bg-light px-3">
                        <option selected disabled class="fw-bold">PILIH SISWA</option>
                        @foreach($data as $siswa)
                        <option value="{{ $siswa->id_siswa }}">{{ $siswa->nama_siswa }}</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="my-1">
                    <label for="">Nama Siswa</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" value="{{ $data->nama_siswa }}" disabled>
                </div>
                <div class="my-1">
                    <label for="">Kelas</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" value="{{ $data->kelas }}" disabled>
                </div>
                <div class="my-1">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" value="{{ $data->keterangan }}" disabled>
                </div>
                <div class="my-1">
                    <label for="">Tanggal Penarikan</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" disabled>
                </div>
                <div class="my-1">
                    <label for="">Nominal</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" value="Rp. {{ $data->nominal }},-" disabled>
                </div>
                <div class="my-1">
                    <label for="">Saldo</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" value="Rp. {{ $data->saldo }},-" disabled>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <a href="{{ route('cetak.transaksi', ['id_transaksi' => $data->id_transaksi]) }}" class="btn bg-gradient-success">
                        <div class="text-white">
                            <i class="material-icons opacity-10">print</i>
                        </div>
                        <span class="nav-link-text ms-1">Cetak Transaksi</span>
                    </a>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection