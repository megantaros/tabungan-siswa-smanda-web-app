<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'nis',
        'nama_siswa',
        'tgl_lahir',
        'kelas',
        'jenis_kelamin',
        'alamat',
        'agama',
        'password'
    ];
    public $timestamps = false;
}