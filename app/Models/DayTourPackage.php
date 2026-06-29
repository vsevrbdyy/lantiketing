<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DayTourPackage extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'location',
        'description',
        'price',
        'image',
        'tags',
        'is_active',
    ];

    protected $casts = [
        'tags'      => 'array',
        'price'     => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Auto-generate slug dari title sebelum disimpan.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->title);
            }
        });

        static::updating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->title);
            }
        });
    }

    public static function generateUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    /**
     * Scope filter berdasarkan kategori.
     */
    public function scopeByCategory($query, ?string $category)
    {
        if (!$category) {
            return $query;
        }
        return $query->whereRaw('LOWER(tags) LIKE ?', ['%' . strtolower($category) . '%']);
    }

    /**
     * Scope search berdasarkan title atau location.
     */
    public function scopeSearch($query, ?string $search)
    {
        if (!$search) {
            return $query;
        }
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhere('location', 'LIKE', "%{$search}%");
        });
    }
}
