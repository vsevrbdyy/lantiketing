<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_code',
        'destination_ticket_id',
        'visitor_name',
        'visitor_email',
        'visitor_whatsapp',
        'visit_date',
        'ticket_qty',
        'price_per_ticket',
        'total_price',
        'notes',
        'status',
    ];

    protected $casts = [
        'visit_date' => 'date',
        'ticket_qty' => 'integer',
        'price_per_ticket' => 'integer',
        'total_price' => 'integer',
    ];

    public function destinationTicket()
    {
        return $this->belongsTo(DestinationTicket::class);
    }

    public static function generateBookingCode()
    {
        $prefix = 'BK';
        $date = date('ymd');
        $random = strtoupper(substr(uniqid(), -6));
        return $prefix . $date . $random;
    }
}