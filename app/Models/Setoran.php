<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_setoran';
    protected $table = 'setoran';
    protected $fillable = [
        'id_siswa',
        'id_tabungan',
        'jumlah_setoran'
    ];
    public $timestamps = false;
}