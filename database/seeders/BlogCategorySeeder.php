<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Trichology & Scalp',
                'slug' => 'trichology',
                'description' => 'Scalp health, microscopic analysis, and clinical trichology insights.',
                'status' => true,
            ],
            [
                'name' => 'Studio Strategy',
                'slug' => 'business',
                'description' => 'Operations, sales training, and client retention for hair studio owners.',
                'status' => true,
            ],
            [
                'name' => 'Personal Journey',
                'slug' => 'personal',
                'description' => 'Lessons from 25 years in the hair loss industry.',
                'status' => true,
            ],
            [
                'name' => 'Wearer Guide',
                'slug' => 'wearer',
                'description' => 'Tips and maintenance guides for hair system wearers.',
                'status' => true,
            ],
        ];

        foreach ($categories as $catData) {
            BlogCategory::updateOrCreate(['slug' => $catData['slug']], $catData);
        }
    }
}
