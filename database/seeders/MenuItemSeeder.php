<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $menuItems = [
            ['label' => 'About', 'url' => '#about', 'location' => 'header', 'sort_order' => 1, 'is_active' => true],
            ['label' => 'Services', 'url' => '#services', 'location' => 'header', 'sort_order' => 2, 'is_active' => true],
            ['label' => 'Credentials', 'url' => '#credentials', 'location' => 'header', 'sort_order' => 3, 'is_active' => true],
            ['label' => 'Gallery', 'url' => '#gallery', 'location' => 'header', 'sort_order' => 4, 'is_active' => true],
            ['label' => 'Testimonials', 'url' => '#testimonials', 'location' => 'header', 'sort_order' => 5, 'is_active' => true],
            ['label' => 'Products', 'url' => '/products', 'location' => 'header', 'sort_order' => 6, 'is_active' => true],
            ['label' => 'Blog', 'url' => '/blog', 'location' => 'header', 'sort_order' => 7, 'is_active' => true],
        ];

        foreach ($menuItems as $item) {
            MenuItem::updateOrCreate(['label' => $item['label']], $item);
        }
    }
}
