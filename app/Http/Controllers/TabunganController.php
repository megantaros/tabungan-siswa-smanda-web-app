<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    //
    public function edit(Request $request, $id_tabungan) {
        $data = Tabungan::where('id_tabungan', $id_tabungan)->first();
        $data->update([
            'saldo' => $request->saldo
        ]);
        Transaksi::create([
            'id_siswa' => $data->id_siswa,
            'keterangan' => 'KESALAHAN INPUT',
            'nominal' => $request->saldo,
        ]);
        return redirect()->back()->with('success', 'Saldo berhasil diupdate');
    }
}