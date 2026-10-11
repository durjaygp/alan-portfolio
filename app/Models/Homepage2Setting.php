<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage2Setting extends Model
{
    use HasFactory;

    protected $table = 'homepage2_settings';

    protected $guarded = [];

    protected $casts = [
        // JSON Repeaters & Arrays
        'hero_audiences' => 'array',
        'proof_stats' => 'array',
        'proof_media_logos' => 'array',
        'problem_items' => 'array',
        'services_items' => 'array',
        'training_items' => 'array',
        'why_items' => 'array',
        'video_items' => 'array',
        'awards_items' => 'array',
        'media_items' => 'array',
        'credential_showcase_items' => 'array',

        // Section Visibilities
        'hero_status' => 'boolean',
        'proof_status' => 'boolean',
        'story_status' => 'boolean',
        'problem_status' => 'boolean',
        'services_status' => 'boolean',
        'training_status' => 'boolean',
        'why_alan_status' => 'boolean',
        'videos_status' => 'boolean',
        'credentials_status' => 'boolean',
        'gallery_status' => 'boolean',
        'blog_status' => 'boolean',
        'contact_status' => 'boolean',

        // Section Sort Orders
        'hero_order' => 'integer',
        'proof_order' => 'integer',
        'story_order' => 'integer',
        'problem_order' => 'integer',
        'services_order' => 'integer',
        'training_order' => 'integer',
        'why_alan_order' => 'integer',
        'videos_order' => 'integer',
        'credentials_order' => 'integer',
        'gallery_order' => 'integer',
        'blog_order' => 'integer',
        'contact_order' => 'integer',
    ];

    /**
     * Get sorted list of active homepage 2 sections
     *
     * @return array<int, string>
     */
    public function getActiveSections(): array
    {
        $sections = [
            'hero' => [
                'id' => 'hero',
                'order' => $this->hero_order ?? 1,
                'status' => $this->hero_status ?? true,
            ],
            'proof' => [
                'id' => 'proof',
                'order' => $this->proof_order ?? 2,
                'status' => $this->proof_status ?? true,
            ],
            'story' => [
                'id' => 'story',
                'order' => $this->story_order ?? 3,
                'status' => $this->story_status ?? true,
            ],
            'problem' => [
                'id' => 'problem',
                'order' => $this->problem_order ?? 4,
                'status' => $this->problem_status ?? true,
            ],
            'services' => [
                'id' => 'services',
                'order' => $this->services_order ?? 5,
                'status' => $this->services_status ?? true,
            ],
            'training' => [
                'id' => 'training',
                'order' => $this->training_order ?? 6,
                'status' => $this->training_status ?? true,
            ],
            'why_alan' => [
                'id' => 'why_alan',
                'order' => $this->why_alan_order ?? 7,
                'status' => $this->why_alan_status ?? true,
            ],
            'videos' => [
                'id' => 'videos',
                'order' => $this->videos_order ?? 8,
                'status' => $this->videos_status ?? true,
            ],
            'credentials' => [
                'id' => 'credentials',
                'order' => $this->credentials_order ?? 9,
                'status' => $this->credentials_status ?? true,
            ],
            'gallery' => [
                'id' => 'gallery',
                'order' => $this->gallery_order ?? 10,
                'status' => $this->gallery_status ?? true,
            ],
            'blog' => [
                'id' => 'blog',
                'order' => $this->blog_order ?? 11,
                'status' => $this->blog_status ?? true,
            ],
            'contact' => [
                'id' => 'contact',
                'order' => $this->contact_order ?? 12,
                'status' => $this->contact_status ?? true,
            ],
        ];

        return collect($sections)
            ->filter(fn ($item) => (bool) $item['status'])
            ->sortBy('order')
            ->pluck('id')
            ->values()
            ->toArray();
    }

    /**
     * Resolve hero image URL with fallback.
     */
    public function getHeroImageUrlAttribute(): string
    {
        return uploads_asset($this->hero_image, 'alanhumphreys/head.jpeg') ?? asset('alanhumphreys/head.jpeg');
    }

    /**
     * Resolve story image URL with fallback.
     */
    public function getStoryImageUrlAttribute(): string
    {
        return uploads_asset($this->story_image, 'alanhumphreys/images/services-portrait.jpg') ?? asset('alanhumphreys/images/services-portrait.jpg');
    }
}
