<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HomepageSettingSeeder::class,
            MenuItemSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            AboutSettingSeeder::class,
            Homepage2SettingSeeder::class,
            SiteSettingSeeder::class,
            PageViewSeeder::class,
        ]);
    }
}
