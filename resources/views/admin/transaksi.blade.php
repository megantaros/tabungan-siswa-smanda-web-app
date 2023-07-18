@extends('layouts.admin')

@section('transaksi')
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
  <div class="row">
    <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">weekend</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Jumlah Setoran</p>
            <h4 class="mb-0">{{ $setoran }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+ Rp </span>{{ $total_setoran }},-</p>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Jumlah Penarikan</p>
            <h4 class="mb-0">{{ $penarikan }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">- Rp </span>{{ $total_penarikan }},-</p>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Total Aktif</p>
            <h4 class="mb-0">{{ $aktif }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+ Rp </span>0,-</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 d-flex">
      <form action="{{ route('admin.transaksi') }}" method="GET" enctype="multipart/form-data" class=" d-flex h-100 align-items-center gap-2 w-100">
      @csrf
      @method('GET')
      <input type="text" class="form-control border-outline bg-white px-3 w-25" placeholder="Cari NIS..." name="search">
      <select name="keterangan" class="form-control bg-white rounded border px-3 fw-bold w-25">
        <option value="PENARIKAN">PENARIKAN</option>
        <option value="SETORAN">SETORAN</option>
        <option value="AKTIF">AKTIF</option>
        <option value="NON-AKTIF">NON-AKTIF</option>
      </select>
      <div class="d-flex h-100 align-items-center mt-3 gap-2">
        <button type="submit" class="btn bg-gradient-info d-flex">
          <div class="text-white">
            <i class="material-icons opacity-10 me-1">search</i>
          </div>
          <span class="nav-link-text">Cari</span>
        </button>
        <a href="{{ route('cetak.transaksi.siswa', request()->query()) }}" target="_blank" class="btn bg-gradient-warning d-flex">
          <div class="text-white">
            <i class="material-icons opacity-10 me-1">print</i>
          </div>
          <span class="nav-link-text ms-1">Print</span>
        </a>
      </div>
      </form>
    </div>
  </div>
  <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 text-center">Tabel Transaksi</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0" style="font-family: 'Montserrat', sans-serif;">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr class="text-center">
                    <th class="text-uppercase text-dark text-sm font-weight-bolder">No</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder">NIS</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder">Nama Siswa</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder text-center">Kelas</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder text-center">Keterangan</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder text-center">Tanggal</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder text-center">Nominal</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- <?php $no = 1 ?> --}}
                  @foreach($data as $index => $siswa)
                  <tr class="text-uppercase text-dark text-sm font-weight-bolder opacity-8">
                      <td class="text-center">{{ $index + $data->firstItem() }}</td>
                      <td class="text-center">{{ $siswa->nis }}</td>
                      <td>{{ $siswa->nama_siswa }}</td>
                      <td class="text-center">{{ $siswa->kelas }}</td>
                      <td class="text-center">{{ $siswa->keterangan }}</td>
                      <td class="text-center">{{ \Carbon\Carbon::parse($siswa->tanggal)->format('d/m/Y') }}</td>
                      <td class="text-left">Rp. {{ $siswa->nominal }}</td>
                      <td class="text-center">
                        <a href="{{ route('get.transaksi', ['id_transaksi' => $siswa->id_transaksi]) }}" class="btn bg-gradient-info">
                          <div class="text-white">
                            <i class="material-icons opacity-10">info</i>
                          </div>
                          <span class="nav-link-text ms-1">Detail Info</span>
                        </a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center my-4">
                {{ $data->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection