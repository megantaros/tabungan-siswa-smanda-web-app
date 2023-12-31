<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'nama_admin',
        'username',
        'email',
        'password'
    ];
    public $timestamps = false;
    protected $hidden = [
        'password'
    ];
}