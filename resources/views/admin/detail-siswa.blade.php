@extends('layouts.admin')

@section('detail-siswa')
active bg-gradient-info
@endsection

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Siswa</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Detail Siswa</h6>
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
    <div class="modal fade" id="editSaldo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Saldo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-warning alert-dismissible text-white">
              <div class="text-sm d-flex justify-content-start align-items-center">
                <i class="material-icons me-2" style="font-size: 26px;">warning</i>
                <span>
                  <strong class="me-1">Perhatian</strong>merubah saldo jika ada kesalahan transaksi.
                </span>
              </div>
            </div>
            <form action="{{ route('update.saldo', ['id_tabungan' => $data->id_tabungan]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                  <div class="my-1">
                      <label>Saldo</label>
                      <input type="text" class="form-control bg-light rounded border px-3 fw-bold" value="{{ $data->saldo }}" name="saldo">
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
  <div class="row">
    <div class="col-12 col-lg-7">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3 text-center">Detail Siswa</h6>
          </div>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('update.siswa', ['id_siswa' => $data->id_siswa]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="my-1">
                    <label for="">NIS</label>
                    <input type="number" class="form-control bg-light rounded border px-3 fw-bold" name="nis" value="{{ $data->nis }}">
                </div>
                @error('nis')
                <div class="alert alert-danger alert-dismissible text-white my-2">
                    <div class="text-sm d-flex justify-content-start align-items-center">
                        <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                        <strong class="me-1">NIS tidak boleh kosong atau sama!</strong>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <div class="my-1">
                    <label for="">Nama Siswa</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" name="nama_siswa" value="{{ $data->nama_siswa }}">
                </div>
                @error('nama_siswa')
                <div class="alert alert-danger alert-dismissible text-white my-2">
                    <div class="text-sm d-flex justify-content-start align-items-center">
                        <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                        <strong class="me-1">Nama Siswa tidak boleh kosong!</strong>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <div class="my-1">
                    <label for="">Kelas</label>
                    <input type="text" class="form-control bg-light rounded border px-3 fw-bold" name="kelas" value="{{ $data->kelas }}">
                </div>
                @error('kelas')
                <div class="alert alert-danger alert-dismissible text-white my-2">
                    <div class="text-sm d-flex justify-content-start align-items-center">
                        <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                        <strong class="me-1">Kelas tidak boleh kosong!</strong>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <div class="my-1">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="form-control bg-light rounded border px-3 fw-bold" name="tgl_lahir" value="{{ $data->tgl_lahir }}">
                </div>
                @error('tgl_lahir')
                <div class="alert alert-danger alert-dismissible text-white my-2">
                    <div class="text-sm d-flex justify-content-start align-items-center">
                        <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                        <strong class="me-1">Tanggal lahir tidak boleh kosong!</strong>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <div class="my-1">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control bg-light rounded border px-3 fw-bold">
                        <option value="{{ $data->jenis_kelamin }}">{{ $data->jenis_kelamin }}</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                @error('jenis_kelamin')
                <div class="alert alert-danger alert-dismissible text-white my-2">
                    <div class="text-sm d-flex justify-content-start align-items-center">
                        <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                        <strong class="me-1">Jenis Kelamin tidak boleh kosong!</strong>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <div class="my-1">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control bg-light rounded border px-3 fw-bold" cols="30" rows="3">{{ $data->alamat }}</textarea>
                </div>
                @error('alamat')
                <div class="alert alert-danger alert-dismissible text-white my-2">
                    <div class="text-sm d-flex justify-content-start align-items-center">
                        <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                        <strong class="me-1">Alamat tidak boleh kosong!</strong>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <div class="my-1">
                    <label for="">Agama</label>
                    <select name="agama" class="form-control bg-light rounded border px-3 fw-bold">
                        <option value="{{ $data->agama }}">{{ $data->agama }}</option>
                        <option value="ISLAM">ISLAM</option>
                        <option value="KRISTEN">KRISTEN</option>
                        <option value="HINDU">HINDU</option>
                        <option value="BUDHA">BUDHA</option>
                        <option value="KONGHUCU">KONGHUCU</option>
                    </select>
                </div>
                @error('agama')
                <div class="alert alert-danger alert-dismissible text-white my-2">
                    <div class="text-sm d-flex justify-content-start align-items-center">
                        <i class="material-icons me-2" style="font-size: 26px;">cancel</i>
                        <strong class="me-1">Agama tidak boleh kosong!</strong>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <div class="d-flex justify-content-end mt-3 gap-2">
                    <button type="submit"class="btn bg-gradient-warning mt-3 px-5" onclick="return confirm('Edit data siswa?')">
                        <div class="text-white">
                            <i class="material-icons opacity-10">edit</i>
                          </div>
                          <span class="nav-link-text ms-1">Edit Siswa</span>
                    </button>
                    <a href="{{ route('delete.siswa', ['id_siswa' => $data->id_siswa]) }}" class="btn bg-gradient-danger mt-3 px-5" onclick="return confirm('Yakin hapus data siswa?')">
                        <div class="text-white">
                            <i class="material-icons opacity-10">delete</i>
                          </div>
                          <span class="nav-link-text ms-1">Hapus Siswa</span>
                    </a>
                </div>
            </form>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-5">
        <div class="row mb-3">
            <div class="col-md-6 col-6">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                    <i class="material-icons opacity-10">money</i>
                  </div>
                </div>
                <div class="card-body pt-0 p-3 text-center">
                  <h6 class="text-center mb-0">Setoran</h6>
                  <span class="text-xs">Total Setoran</span>
                  <hr class="horizontal dark my-3">
                  <h5 class="mb-0 text-success">+ Rp.{{ $total_setoran }},-</h5>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="material-icons opacity-10">account_balance_wallet</i>
                  </div>
                </div>
                @if(Auth::guard('admin')->user()->username == 'bendahara')
                <div class="card-body pt-0 p-3 text-center">
                  <h6 class="text-center mb-0">Saldo</h6>
                  <span class="text-xs">Total Saldo</span>
                  <hr class="horizontal dark my-3">
                  <h5 class="mb-0">Rp.{{ $data->saldo }},-</h5>
                </div>
                @elseif(Auth::guard('admin')->user()->username == 'admin')
                <div class="card-body pt-0 p-3 text-center">
                  <h6 class="text-center mb-0">Saldo</h6>
                  <a type="button" data-toggle="modal" data-target="#editSaldo" class="text-underline">
                    <i class="material-icons text-xs position-relative">edit</i>
                    <span class="text-xs">Ubah Saldo</span>
                  </a>
                  <hr class="horizontal dark my-3">
                  <h5 class="mb-0">Rp.{{ $data->saldo }},-</h5>
                </div>
                @endif
              </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-3 py-3">
                <div class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_more</i></button>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Penarikan</h6>
                        <span class="text-xs">Total</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                      - Rp.{{ $total_penarikan }},-
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Riwayat Transaksi</h6>
              </div>
              <div class="col-6 text-end">
                <a href="#tabel-transaksi" class="btn btn-outline-info btn-sm mb-0">Lihat Semua</a>
              </div>
            </div>
          </div>
          <div class="card-body p-3 pb-0">
            <ul class="list-group">
                @foreach ($riwayat_transaksi as $index => $siswa)
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ \Carbon\Carbon::parse($siswa->tanggal)->format('d-M-Y') }}</h6>
                    <span class="text-xs">{{ $siswa->keterangan }}</span>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                    Rp.{{ $siswa->nominal }},-
                    <a href="{{ route('cetak.transaksi', ['id_transaksi' => $siswa->id_transaksi]) }}" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> PDF</a>
                  </div>
                </li>
                @endforeach
            </ul>
          </div>
        </div>
    </div>
  </div>
</div>
<div class="container-fluid" id="tabel-transaksi">
  <div class="row">
      <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 text-center">Riwayat Transaksi a/n <strong>{{ $data->nama_siswa }}</strong></h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr class="text-center">
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder">No</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder">NIS</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder">Nama Siswa</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center">Kelas</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center">Keterangan</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center">Tanggal</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center">Nominal</th>
                    <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- <?php $no = 1 ?> --}}
                  @foreach($transaksi as $index => $siswa)
                  <tr class="text-uppercase text-secondary text-sm font-weight-bolder opacity-8">
                      <td class="text-center">{{ $index + $transaksi->firstItem() }}</td>
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
                {{ $transaksi->links() }}
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection