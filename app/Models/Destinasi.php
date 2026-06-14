<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $table = 'destinasi';
    
    protected $fillable = [
        'nama_destinasi',
        'deskripsi',
        'harga_tiket',
        'lokasi',
        'gambar'
    ];
}