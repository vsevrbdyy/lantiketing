<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    
    protected $fillable = [
        'user_id',
        'destinasi_id',
        'tanggal_pesan',
        'jumlah_tiket',
        'total_harga',
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class);
    }
}