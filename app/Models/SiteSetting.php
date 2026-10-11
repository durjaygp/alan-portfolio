<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = 'site_settings';

    protected $guarded = [];

    /**
     * Get the singleton site setting record.
     */
    public static function get(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Alan Humphreys',
                'site_tagline' => 'Hair Replacement & Trichology Business Consultant',
                'meta_title' => 'Alan Humphreys — Hair Loss Solutions Expert, Consultant & Industry Innovator',
                'meta_description' => 'Alan Humphreys — 30+ year veteran in hair loss solutions. Industry expert, certified trichologist, business consultant, and brand ambassador. Book a consultation today.',
                'meta_keywords' => 'Alan Humphreys, hair loss consultant, trichology, hair replacement expert, hair loss business consultant, salon trichology',
                'meta_author' => 'Alan Humphreys',
                'og_type' => 'website',
                'twitter_card' => 'summary_large_image',
                'twitter_handle' => '@AlanHumphreys',
                'header_cta_text' => 'Book a Call',
                'header_cta_url' => '#contact',
                'contact_email' => 'alanhumphreys72@gmail.com',
                'contact_phone' => '303-718-1870',
                'contact_address' => 'North Palm Beach, Florida',
                'whatsapp_number' => '+13037181870',
                'copyright_text' => '© 2026 Alan Humphreys. All rights reserved.',
                'facebook_url' => 'https://facebook.com',
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => 'https://linkedin.com',
                'youtube_url' => 'https://youtube.com',
            ]
        );
    }

    /**
     * Resolve favicon URL with fallback.
     */
    public function getFaviconUrlAttribute(): string
    {
        if (! empty($this->favicon)) {
            return uploads_asset($this->favicon);
        }

        return "data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90' font-family='serif' fill='%23586B8C'>A</text></svg>";
    }

    /**
     * Resolve site logo URL with fallback.
     */
    public function getLogoUrlAttribute(): ?string
    {
        if (! empty($this->site_logo)) {
            return uploads_asset($this->site_logo);
        }

        return null;
    }

    /**
     * Resolve dark mode logo URL.
     */
    public function getLogoDarkUrlAttribute(): ?string
    {
        if (! empty($this->site_logo_dark)) {
            return uploads_asset($this->site_logo_dark);
        }

        return $this->logo_url;
    }

    /**
     * Resolve Open Graph social share image URL.
     */
    public function getOgImageUrlAttribute(): string
    {
        return uploads_asset($this->og_image, 'alanhumphreys/images/hero-headshot.jpg') ?? asset('alanhumphreys/images/hero-headshot.jpg');
    }
}
