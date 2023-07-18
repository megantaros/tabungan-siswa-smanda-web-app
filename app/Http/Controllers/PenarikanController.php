<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    //
    // $tabungan = Tabungan::where('id_tabungan', $request->id_tabungan)->first();
    // $tabungan->update([
    //     'saldo' => $tabungan->saldo - $request->jumlah_penarikan,
    // ]);
    public function store(Request $request, $id_siswa) {
        $request->validate([
            'id_tabungan' => 'required',
            'jumlah_penarikan' => 'required',
        ]);
        $tabungan = Tabungan::where('id_tabungan', $request->id_tabungan)->first();
        if ($tabungan->saldo < $request->jumlah_penarikan) {
            return redirect()->back()->with('error', 'Saldo tidak mencukupi');
        }
        $data = Penarikan::create([
            'id_siswa' => $id_siswa,
            'id_tabungan' => $request->id_tabungan,
            'jumlah_penarikan' => $request->jumlah_penarikan,
        ]);
        $transaksi = Transaksi::create([
            'id_siswa' => $id_siswa,
            'nominal' => $request->jumlah_penarikan,
            'keterangan' => 'PENARIKAN',
        ]);
        if($transaksi) {
            return redirect()->route('get.transaksi', ['id_transaksi' => $transaksi->id_transaksi])->with('success', 'Transaksi berhasil dilakukan');
        }  
    }
}