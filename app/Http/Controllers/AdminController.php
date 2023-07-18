<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function login(Request $request) {
        if(Auth::guard('admin')->attempt($request->only('email', 'password'))){
            return redirect()->route('admin.dashboard')->with('success', 'Anda Berhasil Login sebagai Admin');
        }
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        return redirect('/')->with('error', 'Email atau Password Salah !');
    }
    public function store(Request $request) {
        $this->validate($request, [
            'nama_admin' => 'required',
            'email' => 'required|unique:admin',
            'username' => 'required',
            'password' => 'required'
        ]);
        Admin::create([
            'nama_admin' => $request->nama_admin,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan admin!');
    }
    public function update(Request $request) {
        $this->validate($request, [
            'nama_admin' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);
        $auth = Auth::guard('admin')->user();
        $data = Admin::find($auth->id_admin);
        if($request->password) {
            $data->update([
                'nama_admin' => $request->nama_admin,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);
            return redirect()->back()->with('success', 'Berhasil merubah profil!');
        } elseif (!$request->password) {
            $data->update([
                'nama_admin' => $request->nama_admin,
                'email' => $request->email,
                'username' => $request->username,
            ]);
            return redirect()->back()->with('success', 'Berhasil merubah profil!');
        }
        return redirect()->back()->with('error', 'Gagal merubah data!');
    }
    public function update_admin(Request $request, $id_admin) {
        $this->validate($request, [
            'nama_admin' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);
        $data = Admin::find($id_admin);
        if($request->password) {
            $data->update([
                'nama_admin' => $request->nama_admin,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);
            return redirect()->back()->with('success', 'Berhasil merubah profil!');
        } elseif (!$request->password) {
            $data->update([
                'nama_admin' => $request->nama_admin,
                'email' => $request->email,
                'username' => $request->username,
            ]);
            return redirect()->back()->with('success', 'Berhasil merubah profil!');
        }
        return redirect()->back()->with('error', 'Gagal merubah data!');
    }
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}