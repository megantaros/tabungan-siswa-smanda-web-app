<?php

namespace App\Http\Controllers;

use App\Models\Setoran;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class SetoranController extends Controller
{
    //
    public function store(Request $request, $id_siswa)
    {
        $request->validate([
            'id_tabungan' => 'required',
            'jumlah_setoran' => 'required',
        ]);
        Setoran::create([
            'id_siswa' => $id_siswa,
            'id_tabungan' => $request->id_tabungan,
            'jumlah_setoran' => $request->jumlah_setoran,
        ]);
        $transaksi = Transaksi::create([
            'id_siswa' => $id_siswa,
            'nominal' => $request->jumlah_setoran,
            'keterangan' => 'SETORAN',
        ]);
        $tabungan = Tabungan::where('id_tabungan', $request->id_tabungan)->first();
        $tabungan->update([
            'saldo' => $tabungan->saldo + $request->jumlah_setoran,
        ]);
        if ($transaksi) {
            return redirect()->route('get.transaksi', ['id_transaksi' => $transaksi->id_transaksi])->with('success', 'Transaksi berhasil dilakukan');
        }
    }
}