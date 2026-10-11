<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $table = 'gallery_items';

    protected $fillable = [
        'title',
        'subtitle',
        'category',
        'image',
        'before_image',
        'after_image',
        'description',
        'client_name',
        'service_type',
        'timeframe',
        'badge',
        'is_before_after',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_before_after' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope active gallery items.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope ordered items.
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }

    /**
     * Scope by category.
     */
    public function scopeCategory(Builder $query, ?string $category): Builder
    {
        if ($category && $category !== 'all') {
            return $query->where('category', $category);
        }

        return $query;
    }

    /**
     * Get image URL helper.
     */
    public function getImageUrlAttribute(): ?string
    {
        return uploads_asset($this->image, 'alanhumphreys/images/hero-headshot.jpg') ?? asset('alanhumphreys/images/hero-headshot.jpg');
    }

    /**
     * Get before image URL helper.
     */
    public function getBeforeImageUrlAttribute(): ?string
    {
        return uploads_asset($this->before_image);
    }

    /**
     * Get after image URL helper.
     */
    public function getAfterImageUrlAttribute(): ?string
    {
        return uploads_asset($this->after_image);
    }
}
