<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationTicket extends Model
{
    protected $table = "destination_tickets";

    protected $fillable = [
        "title",
        "slug",
        "location",
        "description",
        "deskripsi_panjang",
        "price",
        "image",
        "content_image",
        "hero_image",
        "map_embed_url",
        "map_location_text",
        "tags",
        "is_active",
    ];

    protected $casts = [
        "tags"      => "array",
        "price"     => "integer",
        "is_active" => "boolean",
    ];

    public function paket()
    {
        return $this->hasMany(PaketDestinasi::class, "destination_ticket_id");
    }

    public function galleries()
    {
        return $this->hasMany(DestinationTicketGallery::class, "destination_ticket_id");
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeByCategory($query, ?string $category)
    {
        if (!$category) {
            return $query;
        }

        return $query->whereRaw("LOWER(tags) LIKE ?", ["%" . strtolower($category) . "%"]);
    }

    public function getHargaFormattedAttribute()
    {
        return "Rp " . number_format($this->price, 0, ",", ".");
    }

    public function getTagsArrayAttribute()
    {
        return is_array($this->tags) ? $this->tags : json_decode($this->tags, true) ?? [];
    }

    public function getLocationMapAttribute()
    {
        return [
            "text" => $this->map_location_text ?? $this->location,
            "embed" => $this->map_embed_url,
        ];
    }

    public function getContentImageUrlAttribute()
    {
        if ($this->content_image) {
            return asset("storage/" . $this->content_image);
        }
        return null;
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset("storage/" . $this->image);
        }
        return null;
    }
}