<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $careCat = ProductCategory::where('slug', 'care')->first();
        $trichologyCat = ProductCategory::where('slug', 'trichology')->first();
        $trainingCat = ProductCategory::where('slug', 'training')->first();

        $products = [
            [
                'name' => 'Complete Hair System Maintenance Kit',
                'slug' => 'complete-hair-system-care-kit',
                'category_id' => $careCat?->id,
                'price' => 129.00,
                'original_price' => 155.00,
                'badge' => 'Best Seller',
                'icon' => '🧴',
                'image' => 'alanhumphreys/images/services-portrait.jpg',
                'thumbnail' => 'alanhumphreys/images/services-portrait.jpg',
                'images' => [
                    'alanhumphreys/images/services-portrait.jpg',
                    'alanhumphreys/images/before-after.png',
                ],
                'short_description' => 'Everything you need to maintain your hair system like a professional — adhesive, remover, conditioner, and brush.',
                'description' => 'A complete starter and maintenance package engineered specifically for custom poly and lace hair systems. Developed from 25 years of hands-on wearer experience.',
                'seo_description' => 'Complete professional hair system care kit with adhesive, solvent remover, and conditioner.',
                'seo_tags' => 'Hair System Kit, Maintenance, Scalp Care',
                'seo_keywords' => 'hair system care kit, lace bond, poly remover',
                'sort_order' => 1,
                'status' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Scalp Health Revival Treatment',
                'slug' => 'scalp-health-revival-treatment',
                'category_id' => $trichologyCat?->id,
                'price' => 89.00,
                'original_price' => 110.00,
                'badge' => 'New',
                'icon' => '💆',
                'image' => null,
                'short_description' => 'Clinical-grade scalp treatment for early-stage hair loss and scalp conditions. Based on protocols I developed at Hair Vital starting in 2014.',
                'description' => 'Exfoliates clogged scalp pores, calms micro-inflammation, and strengthens hair bulbs using botanical antioxidants and trichology-grade active ingredients.',
                'seo_description' => 'Clinical scalp health revival treatment for hair density and scalp recovery.',
                'seo_tags' => 'Scalp Treatment, Trichology, Hair Restoration',
                'seo_keywords' => 'scalp revival, micro inflammation, scalp serum',
                'sort_order' => 2,
                'status' => true,
                'is_active' => true,
            ],
            [
                'name' => 'The Hair Studio Sales Playbook',
                'slug' => 'the-hair-studio-sales-playbook',
                'category_id' => $trainingCat?->id,
                'price' => 199.00,
                'original_price' => 249.00,
                'badge' => 'Guide',
                'icon' => '📘',
                'image' => null,
                'short_description' => 'My complete sales methodology — from first consultation to closing. The exact techniques that helped me train dozens of sales teams.',
                'description' => 'A step-by-step master guide for salon owners and sales specialists. Includes objection-handling scripts, consultation workflows, and pricing strategies.',
                'seo_description' => 'Hair studio sales playbook and consultation mastery guide by Alan Humphreys.',
                'seo_tags' => 'Sales Playbook, Salon Consultation, Business Growth',
                'seo_keywords' => 'salon sales guide, hair replacement consultation',
                'sort_order' => 3,
                'status' => true,
                'is_active' => true,
            ],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(['slug' => $prod['slug']], $prod);
        }
    }
}
