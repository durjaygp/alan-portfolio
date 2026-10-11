<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'main_content',
        'description',
        'user_id',
        'category_id',
        'seo_description',
        'seo_tags',
        'seo_keywords',
        'status',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Accessors for backward compatibility with Post attributes
    public function getTitleAttribute(): ?string
    {
        return $this->name;
    }

    public function getContentAttribute(): ?string
    {
        return $this->main_content;
    }

    public function getExcerptAttribute(): ?string
    {
        return $this->description;
    }

    public function getIsPublishedAttribute(): bool
    {
        return (bool) $this->status;
    }

    /**
     * Resolve blog featured image URL.
     */
    public function getImageUrlAttribute(): ?string
    {
        return uploads_asset($this->image);
    }
}
