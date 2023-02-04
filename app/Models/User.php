<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'users';
    protected $guard = 'users';

    protected $fillable = [
       'nama_lengkap',
       'username',
       'email',
       'password',
       'kode_verifikasi',
       'confirm_verifikasi',
       'validate' ,
       'token',
    ];
    
}
