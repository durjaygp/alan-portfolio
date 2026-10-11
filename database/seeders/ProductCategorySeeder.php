<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Hair System Care & Adhesives',
                'slug' => 'care',
                'description' => 'Clinical-grade adhesives, solvent removers, scalp protectors, and daily maintenance products.',
                'status' => true,
                'seo_description' => 'Hair system maintenance kits, adhesives, and scalp care by Alan Humphreys.',
                'seo_tags' => 'Hair System Care, Adhesives, Maintenance',
                'seo_keywords' => 'hair system care, lace adhesive, scalp protector',
            ],
            [
                'name' => 'Trichology Scalp Treatments',
                'slug' => 'trichology',
                'description' => 'Professional scalp revival formulations, micro-exfoliants, and follicle stimulation treatments.',
                'status' => true,
                'seo_description' => 'Trichology scalp treatments and hair restoration products.',
                'seo_tags' => 'Trichology, Scalp Health, Follicle Revival',
                'seo_keywords' => 'trichology scalp treatment, scalp health',
            ],
            [
                'name' => 'Studio Strategy Playbooks & Training',
                'slug' => 'training',
                'description' => 'Sales training playbooks, consultation frameworks, and operational guides for salon owners.',
                'status' => true,
                'seo_description' => 'Salon sales playbooks and trichology business training.',
                'seo_tags' => 'Sales Playbook, Salon Growth, Training',
                'seo_keywords' => 'salon playbook, hair loss studio consulting',
            ],
        ];

        foreach ($categories as $catData) {
            ProductCategory::updateOrCreate(['slug' => $catData['slug']], $catData);
        }
    }
}
