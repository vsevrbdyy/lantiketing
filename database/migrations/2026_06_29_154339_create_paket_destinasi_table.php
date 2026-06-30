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
        'icon'
    ];

    public function destinationTicket()
    {
        return $this->belongsTo(DestinationTicket::class);
    }
}