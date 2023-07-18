<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function login() {
        $data = Admin::where('id_admin', 1)->first();

        return view('login', compact('data'));
    }
    public function dashboard(Request $request) {
        $total_admin = Admin::where('username', 'admin')->count();
        $total_bendahara = Admin::where('username', 'bendahara')->count();
        $total_siswa = Siswa::count();
        $total_saldo = Tabungan::sum('saldo');
        if($request->search) {
            $data = Siswa::join('tabungan', 'siswa.id_siswa', '=', 'tabungan.id_siswa')
                ->where('siswa.nis', '=', $request->search)
                ->get();
            } else {
            $data = Siswa::join('tabungan', 'siswa.id_siswa', '=', 'tabungan.id_siswa')
                ->get();
        }
        // dd($data);
        return view('admin.dashboard', compact('data', 'total_admin', 'total_bendahara', 'total_siswa', 'total_saldo'));
    }
    public function users_admin(Request $request) {
        if($request->search) {
            $data = Admin::where('username', '=', $request->search)
                ->get();
            } else {
            $data = Admin::get();
        }
        // dd($data);
        return view('admin.daftar-admin', compact('data'));
    }
    public function tambah_admin() {
        return view('admin.tambah-admin');
    }
    public function get_admin($id_admin) {
        $data = Admin::where('id_admin', $id_admin)->first();
        return view('admin.detail-admin', compact('data'));
    }
    public function cetak_siswa(Request $request) {
        if($request->search) {
            $data = Siswa::join('tabungan', 'siswa.id_siswa', '=', 'tabungan.id_siswa')
                ->where('siswa.nis', '=', $request->search)
                ->get();
            } else {
            $data = Siswa::join('tabungan', 'siswa.id_siswa', '=', 'tabungan.id_siswa')
                ->get();
        }
        // dd($data);
        return view('admin.cetak-siswa', compact('data'));
    }
    public function tambah_siswa() {
        // dd($data);
        return view('admin.tambah-siswa');
    }
    public function get_siswa($id_siswa) {
        $data = Siswa::join('tabungan', 'siswa.id_siswa', '=', 'tabungan.id_siswa')
            ->where('siswa.id_siswa', $id_siswa)
            ->first();
        $total_setoran = Transaksi::where('id_siswa', $id_siswa)
            ->where('keterangan', 'SETORAN')
            ->sum('nominal');
        if($total_setoran == null) {
            $total_setoran = 0;
        }
        $total_penarikan = Transaksi::where('id_siswa', $id_siswa)
            ->where('keterangan', 'PENARIKAN')
            ->sum('nominal');
        if($total_penarikan == null) {
            $total_penarikan = 0;
        }
        $transaksi = Transaksi::join('siswa', 'siswa.id_siswa', '=', 'transaksi.id_siswa')
            ->where('siswa.id_siswa', $id_siswa)
            ->orderBy('id_transaksi', 'desc')
            ->select('siswa.*', 'transaksi.*')
            ->paginate(10);
        $riwayat_transaksi = Transaksi::join('siswa', 'siswa.id_siswa', '=', 'transaksi.id_siswa')
            ->where('siswa.id_siswa', $id_siswa)
            ->orderBy('id_transaksi', 'desc')
            ->select('siswa.*', 'transaksi.*')
            ->paginate(8);
        return view('admin.detail-siswa', compact('data', 'transaksi', 'riwayat_transaksi', 'total_setoran', 'total_penarikan'));
    }
    public function transaksi(Request $request) {
        $query = Transaksi::join('siswa', 'transaksi.id_siswa', '=', 'siswa.id_siswa')
            ->orderBy('transaksi.id_transaksi', 'desc')
            ->select('transaksi.*', 'siswa.*');
        if ($request->search) {
            $query->where('siswa.nis', $request->search);
        }
        if ($request->keterangan) {
            $query->where('transaksi.keterangan', $request->keterangan);
        }
        if ($request->search && $request->keterangan) {
            $query->where('siswa.nis', $request->search);
            $query->where('transaksi.keterangan', 'like', '%'.$request->keterangan.'%');
        }
        $data = $query->paginate(20);       
        $setoran = Transaksi::where('keterangan', 'setoran')->count();
        $total_setoran = Transaksi::where('keterangan', 'setoran')->sum('nominal');
        $penarikan = Transaksi::where('keterangan', 'penarikan')->count();
        $total_penarikan = Transaksi::where('keterangan', 'penarikan')->sum('nominal');
        $aktif = Transaksi::where('keterangan', 'aktif')->count();
        // dd($data);
        return view('admin.transaksi', compact('data', 'setoran', 'penarikan', 'aktif', 'total_penarikan', 'total_setoran'));
    }
    public function cetak_transaksi(Request $request) {
        $query = Transaksi::join('siswa', 'transaksi.id_siswa', '=', 'siswa.id_siswa')
            ->orderBy('transaksi.id_transaksi', 'desc')
            ->select('transaksi.*', 'siswa.*');
        if ($request->search) {
            $query->where('siswa.nis', $request->search);
        }
        if ($request->keterangan) {
            $query->where('transaksi.keterangan', $request->keterangan);
        }
        if ($request->search && $request->keterangan) {
            $query->where('siswa.nis', $request->search);
            $query->where('transaksi.keterangan', 'like', '%'.$request->keterangan.'%');
        }
        $data = $query->get();   
        // dd($data);
        return view('admin.cetak-transaksi-siswa', compact('data'));
    }
    public function get_transaksi($id_transaksi) {
        $data = Transaksi::join('siswa', 'siswa.id_siswa', '=', 'transaksi.id_siswa')
            ->join('tabungan', 'tabungan.id_siswa', '=', 'siswa.id_siswa')
            ->where('transaksi.id_transaksi', $id_transaksi)
            ->select('siswa.*', 'transaksi.*', 'tabungan.saldo')
            ->first();
        return view('admin.detail_transaksi', compact('data'));
        // dd($data);
    }
    public function cetak_penarikan($id_transaksi) {
        $data = Transaksi::join('siswa', 'siswa.id_siswa', '=', 'transaksi.id_siswa')
            ->join('tabungan', 'tabungan.id_siswa', '=', 'siswa.id_siswa')
            ->where('transaksi.id_transaksi', $id_transaksi)
            ->select('siswa.*', 'transaksi.*', 'tabungan.saldo')
            ->first();
        return view('admin.cetak_transaksi', compact('data'));
    }
    public function penarikan($id_siswa) {
        $data = Siswa::join('tabungan', 'siswa.id_siswa', '=', 'tabungan.id_siswa')
        ->where('siswa.id_siswa', $id_siswa)
        ->select('siswa.*', 'tabungan.*')
        ->first();
        return view('admin.penarikan', compact('data'));
    }
    public function setoran($id_siswa) {
        $data = Siswa::join('tabungan', 'siswa.id_siswa', '=', 'tabungan.id_siswa')
        ->where('siswa.id_siswa', $id_siswa)
        ->select('siswa.*', 'tabungan.*')
        ->first();
        return view('admin.setoran', compact('data'));
    }
    public function profil() {
        return view('admin.profil');
    }
}