<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketDestinasi extends Model
{
    protected $table = 'paket_destinasi';

    protected $fillable = [
    'destination_ticket_id',
    'nama',
    'deskripsi',
    'harga',
    'image',  
    'icon',
    ];

    protected $casts = [
        'harga' => 'integer',
    ];

    public function destinationTicket()
    {
        return $this->belongsTo(DestinationTicket::class, 'destination_ticket_id');
    }
}