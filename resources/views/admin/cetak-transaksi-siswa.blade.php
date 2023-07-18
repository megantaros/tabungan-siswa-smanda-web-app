@extends('layouts.cetak')

@section('title')
Cetak Transaksi Siswa
@endsection

@section('content')
<div class="w-100 px-5 py-4 rounded" style="max-height: min-content !important;">
    <h3 class="text-center border-0 my-5">
        <strong>DAFTAR TRANSAKSI</strong>
    </h3>
    <div class="px-0 border">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kelas</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nominal</th>
              </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                @foreach($data as $siswa)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama_siswa }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ $siswa->keterangan }}</td>
                    <td>{{ $siswa->tanggal }}</td>
                    <td>{{ $siswa->nominal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection