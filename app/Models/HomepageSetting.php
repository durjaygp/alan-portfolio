<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'hero_stats' => 'array',
        'what_i_do_items' => 'array',
        'services_items' => 'array',
        'about_info_items' => 'array',
        'about_highlights' => 'array',
        'education_items' => 'array',
        'experience_items' => 'array',
        'toolkit_items' => 'array',
        'certifications_items' => 'array',
        'leadership_items' => 'array',
        'research_interests' => 'array',
        'consultancy_expertise' => 'array',
        'video_items' => 'array',
        'testimonial_items' => 'array',
        'credential_items' => 'array',
        'awards_items' => 'array',
        'media_items' => 'array',
        'credential_showcase_items' => 'array',
        'social_media_items' => 'array',
        'contact_business_types' => 'array',
        'contact_primary_interests' => 'array',
        'service_models_items' => 'array',
        'perspective_items' => 'array',

        // Section Visibilities
        'hero_status' => 'boolean',
        'about_status' => 'boolean',
        'services_status' => 'boolean',
        'videos_status' => 'boolean',
        'testimonials_status' => 'boolean',
        'credentials_status' => 'boolean',
        'products_status' => 'boolean',
        'product_status' => 'boolean',
        'service_models_status' => 'boolean',
        'perspective_status' => 'boolean',
        'contact_status' => 'boolean',

        // Section Sort Orders
        'hero_order' => 'integer',
        'about_order' => 'integer',
        'services_order' => 'integer',
        'videos_order' => 'integer',
        'testimonials_order' => 'integer',
        'credentials_order' => 'integer',
        'products_order' => 'integer',
        'service_models_order' => 'integer',
        'perspective_order' => 'integer',
        'contact_order' => 'integer',
    ];

    /**
     * Get sorted list of active homepage sections
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
            'about' => [
                'id' => 'about',
                'order' => $this->about_order ?? 2,
                'status' => $this->about_status ?? true,
            ],
            'services' => [
                'id' => 'services',
                'order' => $this->services_order ?? 3,
                'status' => $this->services_status ?? true,
            ],
            'videos' => [
                'id' => 'videos',
                'order' => $this->videos_order ?? 4,
                'status' => $this->videos_status ?? true,
            ],
            'testimonials' => [
                'id' => 'testimonials',
                'order' => $this->testimonials_order ?? 5,
                'status' => $this->testimonials_status ?? true,
            ],
            'credentials' => [
                'id' => 'credentials',
                'order' => $this->credentials_order ?? 6,
                'status' => $this->credentials_status ?? true,
            ],
            'products' => [
                'id' => 'products',
                'order' => $this->products_order ?? 7,
                'status' => $this->products_status ?? ($this->product_status ?? true),
            ],
            'service_models' => [
                'id' => 'service_models',
                'order' => $this->service_models_order ?? 8,
                'status' => $this->service_models_status ?? true,
            ],
            'perspective' => [
                'id' => 'perspective',
                'order' => $this->perspective_order ?? 9,
                'status' => $this->perspective_status ?? true,
            ],
            'contact' => [
                'id' => 'contact',
                'order' => $this->contact_order ?? 10,
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
     * Resolve about image URL with fallback.
     */
    public function getAboutImageUrlAttribute(): string
    {
        return uploads_asset($this->about_image, 'alanhumphreys/images/services-portrait.jpg') ?? asset('alanhumphreys/images/services-portrait.jpg');
    }
}
