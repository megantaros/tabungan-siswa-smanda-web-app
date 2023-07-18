<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    // public function update(Request $request, $id_transaksi) {
    //     if($request->keterangan === 'SETORAN') {
    //         $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->first();
    //         $transaksi->update([
    //             'nominal' => $request->nominal
    //         ]);
    //         $tabungan = Tabungan::where('id_siswa', $transaksi->id_siswa)->first();
    //         $tabungan->update([
    //             'saldo' => $request->saldo + $transaksi->nominal
    //         ]);
    //         return redirect()->back()->with('success', 'Transaksi berhasil diupdate');
    //     } elseif($request->keterangan === 'PENARIKAN') {
    //         $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->first();
    //         $transaksi->update([
    //             'nominal' => $request->nominal
    //         ]);
    //         $tabungan = Tabungan::where('id_siswa', $transaksi->id_siswa)->first();
    //         $tabungan->update([
    //             'saldo' => $request->saldo - $transaksi->nominal
    //         ]);
    //         return redirect()->back()->with('success', 'Transaksi berhasil diupdate');
    //     }
    //     return redirect()->back()->with('error', 'Transaksi gagal diupdate');
    // }
}