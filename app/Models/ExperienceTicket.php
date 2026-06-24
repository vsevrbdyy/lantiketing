<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceTicket extends Model
{
    protected $fillable = [
        'title', 'location', 'description', 'price', 'image', 'tags', 'is_active'
    ];

    protected $casts = [
        'tags' => 'array',
        'price' => 'integer',
        'is_active' => 'boolean',
    ];
}