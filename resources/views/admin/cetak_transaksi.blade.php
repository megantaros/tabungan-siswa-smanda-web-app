@extends('layouts.cetak')

@section('title')
Cetak Penarikan
@endsection

@section('content')
<div class="card px-5 py-4 rounded bg-light" style="max-height: min-content !important;">
    <div class="card-header text-center bg-light">
      <h3>
          <strong>Transaksi Berhasil</strong>
      </h3>
      <p>Jenis Transaksi: {{ $data->keterangan }}</p>
    </div>
    <div class="card-body px-0 border-none">
        <table class="table table-striped">
          <tbody>
              <tr>
                <th scope="col">Identitas</th>
                <th scope="col">Keterangan</th>
              </tr>
              <tr>
                  <td>NIS</td>
                  <td><strong>{{ $data->nis}}</strong></td>
              </tr>
              <tr>
                <td>Nama Siswa</td>
                <td><strong>{{ $data->nama_siswa }}</strong></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td><strong>{{ $data->kelas }}</strong></td>
              </tr>
              <tr>
                <td>Tanggal Penarikan</td>
                <td><strong>{{ \Carbon\Carbon::now()->format('d-M-Y') }}</strong></td>
              </tr>
              <tr>
                <td>Nominal</td>
                <td><strong>Rp.{{ $data->nominal }},-</strong></td>
              </tr>
              <tr>
                <td>Sisa Saldo</td>
                <td><strong>Rp.{{ $data->saldo }},-</strong></td>
              </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection