<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationTicket extends Model
{
    protected $fillable = [
        'title', 'location', 'description', 'price', 'image', 'tags', 'is_active'
    ];

    protected $casts = [
        'tags'      => 'array',  // disamakan dengan model lain (sebelumnya 'json')
        'price'     => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Scope filter berdasarkan kategori (dicocokkan ke dalam array tags).
     * Dipanggil: DestinationTicket::byCategory('beach')->get()
     */
    public function scopeByCategory($query, ?string $category)
    {
        if (!$category) {
            return $query;
        }

        return $query->whereRaw('LOWER(tags) LIKE ?', ['%' . strtolower($category) . '%']);
    }
}
