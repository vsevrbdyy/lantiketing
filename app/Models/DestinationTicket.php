<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationTicket extends Model
{
    protected $fillable = [
        'title', 'location', 'description', 'price', 'image', 'tags', 'is_active'
    ];

    protected $casts = [
        'tags' => 'json',
        'price' => 'integer',
        'is_active' => 'boolean',
    ];
}