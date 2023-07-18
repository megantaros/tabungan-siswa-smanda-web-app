@extends('layouts.cetak')

@section('title')
Cetak Siswa
@endsection

@section('content')
<div class="w-100 px-5 py-4 rounded" style="max-height: min-content !important;">
    <h3 class="text-center border-0 my-5">
        <strong>DAFTAR SISWA</strong>
    </h3>
    <div class="px-0 border">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kelas</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Saldo</th>
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
                    <td>{{ $siswa->tgl_lahir }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>{{ $siswa->saldo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection