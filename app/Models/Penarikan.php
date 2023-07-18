<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    use HasFactory;
    protected $table = 'penarikan';
    protected $primaryKey = 'id_penarikan';
    protected $fillable = [
        'id_siswa',
        'id_tabungan',
        'jumlah_penarikan',
    ];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}