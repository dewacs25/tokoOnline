<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;


    protected $table = 'tokos';

    protected $fillable = [
        'id_user',
        'id_level',
        'nama_toko',
        'deskripsi_toko',
        'logo_toko',
        'banner',
        'validate' ,
     ];

     public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
