<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationTicketGallery extends Model
{
    protected $table = 'destination_ticket_galleries';
    
    protected $fillable = [
        'destination_ticket_id',
        'image_path',
        'sort_order',
    ];

    public function destinationTicket()
    {
        return $this->belongsTo(DestinationTicket::class, 'destination_ticket_id');
    }
}