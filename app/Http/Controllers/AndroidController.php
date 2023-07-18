<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AndroidController extends Controller
{
    //Login
    public function login(Request $request) {
        $credentials = $request->only('nis', 'password');
        if(!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Login gagal'
            ], 401);
        }
        $auth = Siswa::join('tabungan', 'siswa.id_siswa', '=', 'tabungan.id_siswa')
            ->where('nis', $request->nis)->first();
        return response()->json([
            'message' => 'Login berhasil',
            'data' => $auth
        ], 200);
    }
    // Tampil Saldo
    public function saldo($id_siswa) {
        $tabungan = Tabungan::where('id_siswa', $id_siswa)->first();
        return response()->json([
            'message' => 'Tampil saldo berhasil',
            'data' => $tabungan
        ], 200);
    }
    public function transaksi($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->get();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Berhasil',
            'data' => $data
        ]);
    }
    public function transaksi_week($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->whereBetween('tanggal', [now()->startOfWeek(), now()->endOfWeek()])->get();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Minggu Terakhir Berhasil',
            'data' => $data
        ]);
    }
    public function transaksi_month($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->whereBetween('tanggal', [now()->startOfMonth(), now()->endOfMonth()])->get();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Bulan Terakhir Berhasil',
            'data' => $data
        ]);
    }
    public function setoran($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->where('keterangan', 'SETORAN')->get();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Bulan Terakhir Berhasil',
            'data' => $data
        ]);
    }
    public function setoran_week($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->where('keterangan', 'SETORAN')->whereBetween('tanggal', [now()->startOfWeek(), now()->endOfWeek()])->get();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Bulan Terakhir Berhasil',
            'data' => $data
        ]);
    }
    public function setoran_month($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->where('keterangan', 'SETORAN')->whereBetween('tanggal', [now()->startOfMonth(), now()->endOfMonth()])->get();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Bulan Terakhir Berhasil',
            'data' => $data
        ]);
    }
    public function penarikan($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->where('keterangan', 'PENARIKAN')->get();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Bulan Terakhir Berhasil',
            'data' => $data
        ]);
    }
    public function penarikan_week($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->where('keterangan', 'PENARIKAN')->whereBetween('tanggal', [now()->startOfWeek(), now()->endOfWeek()])->get();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Bulan Terakhir Berhasil',
            'data' => $data
        ]);
    }
    public function penarikan_month($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->where('keterangan', 'PENARIKAN')->whereBetween('tanggal', [now()->startOfMonth(), now()->endOfMonth()])->get();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Bulan Terakhir Berhasil',
            'data' => $data
        ]);
    }
    public function get_transaksi($id_transaksi) {
        $data = Transaksi::join('siswa', 'siswa.id_siswa', '=', 'transaksi.id_siswa')
            ->join('tabungan', 'tabungan.id_siswa', '=', 'siswa.id_siswa')
            ->where('transaksi.id_transaksi', $id_transaksi)
            ->select('siswa.*', 'transaksi.*', 'tabungan.saldo')
            ->first();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Berhasil',
            'data' => $data
        ]);
    }
    public function get_last_transaksi($id_siswa) {
        $data = Transaksi::where('id_siswa', $id_siswa)->orderBy('id_transaksi', 'desc')->first();
        return response()->json([
            'message' => 'Tampil Riwayat Transaksi Berhasil',
            'data' => $data
        ]);
    }
    public function update(Request $request, $id_siswa) {
        $data = Siswa::where('id_siswa', $id_siswa)->first();
        if ($request->has('password')) {
            $data->update([
                'nis' => $request->nis,
                'nama_siswa' => $request->nama_siswa,
                'tgl_lahir' => $request->tgl_lahir,
                'kelas' => $request->kelas,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'password' => bcrypt($request->password)
            ]);
        }
        $data->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'tgl_lahir' => $request->tgl_lahir,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
        ]);
        return response()->json([
            'message' => 'Update Data Berhasil',
            'data' => $data
        ]);
    }
}