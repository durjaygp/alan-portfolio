<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'price',
        'original_price',
        'badge',
        'icon',
        'image',
        'thumbnail',
        'images',
        'short_description',
        'description',
        'included_items',
        'overview_instructions',
        'ingredients_safety',
        'faqs',
        'seo_description',
        'seo_tags',
        'seo_keywords',
        'sort_order',
        'status',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'included_items' => 'array',
        'faqs' => 'array',
        'images' => 'array',
        'status' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true)->where('is_active', true);
    }

    /**
     * Resolve product main image URL.
     */
    public function getImageUrlAttribute(): ?string
    {
        return uploads_asset($this->image);
    }

    /**
     * Resolve product thumbnail URL.
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        return uploads_asset($this->thumbnail ?? $this->image);
    }

    /**
     * Resolve all gallery image URLs.
     *
     * @return array<int, string>
     */
    public function getImagesUrlsAttribute(): array
    {
        if (empty($this->images) || ! is_array($this->images)) {
            return [];
        }

        return array_values(array_filter(array_map(fn ($img) => uploads_asset($img), $this->images)));
    }
}
