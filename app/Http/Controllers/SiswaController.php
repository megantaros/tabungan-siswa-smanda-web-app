<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function store(Request $request)
    {
        $rules = [
            'nis' => 'required|unique:siswa',
            'nama_siswa' => 'required',
            'tgl_lahir' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
        ];
        $data = Siswa::create($request->validate($rules));
        $data->update([
            'password' => bcrypt('siswa'),
        ]);
        Tabungan::create([
            'id_siswa' => $data->id_siswa,
            'saldo' => 0,
        ]);
        $transaksi = Transaksi::create([
            'id_siswa' => $data->id_siswa,
            'keterangan' => 'AKTIF',
            'nominal' => 0,
        ]);
        if ($transaksi) {
            return redirect()->route('admin.get.siswa', ['id_siswa' => $data->id_siswa])->with('success', 'Data siswa berhasil ditambahkan');
        }
    }
    public function update(Request $request, $id_siswa)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nama_siswa' => 'required',
            'tgl_lahir' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
        ]);
        $data = Siswa::find($id_siswa);
        $data->update($request->all());
        if ($data) {
            return redirect()->route('admin.get.siswa', ['id_siswa' => $id_siswa])->with('success', 'Data siswa berhasil diubah');
        }
    }
    public function delete($id_siswa)
    {
        $tabungan = Tabungan::where('id_siswa', $id_siswa)->first();
        $tabungan->update([
            'saldo' => 0,
        ]);
        Transaksi::create([
            'id_siswa' => $id_siswa,
            'keterangan' => 'NON-AKTIF',
            'nominal' => 0,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Data siswa berhasil dihapus');

    }
}