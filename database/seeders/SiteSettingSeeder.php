<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Alan Humphreys',
                'site_tagline' => 'Hair Replacement & Trichology Business Consultant',
                'meta_title' => 'Alan Humphreys — Hair Loss Solutions Expert, Consultant & Industry Innovator',
                'meta_description' => 'Alan Humphreys — 30+ year veteran in hair loss solutions. Industry expert, certified trichologist, business consultant, and brand ambassador. Book a consultation today.',
                'meta_keywords' => 'Alan Humphreys, hair loss consultant, trichology, hair replacement expert, hair loss business consultant, salon trichology, non-surgical hair restoration',
                'meta_author' => 'Alan Humphreys',
                'og_image' => 'alanhumphreys/images/hero-headshot.jpg',
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
}
