<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@alan-humphreys.com')->first();
        $trichologyCat = BlogCategory::where('slug', 'trichology')->first();
        $businessCat = BlogCategory::where('slug', 'business')->first();
        $personalCat = BlogCategory::where('slug', 'personal')->first();
        $wearerCat = BlogCategory::where('slug', 'wearer')->first();

        $blogs = [
            [
                'name' => 'Why Most Hair Studios Fail at Client Retention (And How We Built a 92% Loyalty Rate)',
                'slug' => 'why-most-hair-studios-fail-at-client-retention',
                'category_id' => $businessCat?->id,
                'user_id' => $admin?->id,
                'image' => 'alanhumphreys/images/services-portrait.jpg',
                'description' => 'In 1997, when I bought Hairlines Inc., we were losing clients faster than we could sign them up. It took three years of hard lessons to realize that clients don\'t leave because of the hair — they leave because of how the consultation made them feel.',
                'main_content' => '<p>In 1997, when I bought Hairlines Inc., we were losing clients faster than we could sign them up. It took three years of hard lessons to realize that clients don\'t leave because of the hair — they leave because of how the consultation made them feel.</p><p>Here is the exact retention framework we used for 25 years to sustain over a 90% client retention rate across thousands of individuals.</p>',
                'seo_description' => 'Client retention strategies for hair loss studios and salons by Alan Humphreys.',
                'seo_tags' => 'Retain Clients, Salon Business, Hair Loss Studio',
                'seo_keywords' => 'retention, salon growth, trichology business',
                'status' => true,
            ],
            [
                'name' => 'The Psychological Shift: Moving From Hiding Hair Loss to Owning Your Transformation',
                'slug' => 'the-psychological-shift-hiding-hair-loss',
                'category_id' => $wearerCat?->id,
                'user_id' => $admin?->id,
                'image' => 'alanhumphreys/images/before-after.png',
                'description' => 'At 21, I was ashamed to tell my friends I was getting hair replacement. Today, 3,000 clients later, I break down how mindset changes everything.',
                'main_content' => '<p>Hair loss isn\'t just physical; it\'s psychological. Owning your choice to restore your hair changes your posture, confidence, and interactions.</p>',
                'seo_description' => 'Psychology of hair replacement and regaining confidence.',
                'seo_tags' => 'Wearer Guide, Confidence, Hair Systems',
                'seo_keywords' => 'hair loss psychology, hair replacement wearer',
                'status' => true,
            ],
            [
                'name' => 'Demystifying Scalp Micro-Inflammation: What Every Specialist Needs to Spot Early',
                'slug' => 'demystifying-scalp-micro-inflammation',
                'category_id' => $trichologyCat?->id,
                'user_id' => $admin?->id,
                'image' => 'alanhumphreys/images/trichology-cert.jpg',
                'description' => 'Why topical treatments fail when underlying scalp inflammation is ignored. Key diagnostic signals I learned during trichology certification.',
                'main_content' => '<p>Micro-inflammation suffocates follicles before visible thinning even begins. Spotting red spots and sebum buildup early saves hair density.</p>',
                'seo_description' => 'Scalp micro-inflammation analysis for trichologists and specialists.',
                'seo_tags' => 'Trichology, Scalp Health, Diagnostics',
                'seo_keywords' => 'scalp health, micro inflammation, trichologist tips',
                'status' => true,
            ],
            [
                'name' => 'Reflections on the Lifetime Visionary Award: What Has Changed in 25 Years',
                'slug' => 'reflections-on-lifetime-visionary-award',
                'category_id' => $personalCat?->id,
                'user_id' => $admin?->id,
                'image' => 'alanhumphreys/images/award-ceremony.jpg',
                'description' => 'Looking back at 2018 in Fort Lauderdale and comparing where the industry was then versus the rapid innovation we are seeing today.',
                'main_content' => '<p>Winning the Lifetime Visionary Award was a humbling milestone. Over 25 years, materials have evolved from thick heavy bases to hyper-realistic breathable units.</p>',
                'seo_description' => 'Alan Humphreys reflections on 25 years in the hair replacement industry.',
                'seo_tags' => 'Lifetime Award, History, Hair Industry',
                'seo_keywords' => 'alan humphreys award, hair visions',
                'status' => true,
            ],
        ];

        foreach ($blogs as $blogData) {
            Blog::updateOrCreate(['slug' => $blogData['slug']], $blogData);
        }
    }
}
