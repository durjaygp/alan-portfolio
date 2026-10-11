<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('homepage_settings')) {
            Schema::table('homepage_settings', function (Blueprint $table) {
                // 1. Hero Section
                if (! Schema::hasColumn('homepage_settings', 'hero_status')) {
                    $table->boolean('hero_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'hero_order')) {
                    $table->integer('hero_order')->default(1);
                }

                // 2. About / Story Section
                if (! Schema::hasColumn('homepage_settings', 'about_status')) {
                    $table->boolean('about_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'about_order')) {
                    $table->integer('about_order')->default(2);
                }

                // 3. What I Do / Services Section
                if (! Schema::hasColumn('homepage_settings', 'services_status')) {
                    $table->boolean('services_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'services_order')) {
                    $table->integer('services_order')->default(3);
                }

                // 4. Watch & Learn / Videos Section
                if (! Schema::hasColumn('homepage_settings', 'videos_status')) {
                    $table->boolean('videos_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'videos_order')) {
                    $table->integer('videos_order')->default(4);
                }

                // 5. Testimonials Section
                if (! Schema::hasColumn('homepage_settings', 'testimonials_status')) {
                    $table->boolean('testimonials_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'testimonials_order')) {
                    $table->integer('testimonials_order')->default(5);
                }

                // 6. Credentials Section
                if (! Schema::hasColumn('homepage_settings', 'credentials_status')) {
                    $table->boolean('credentials_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'credentials_order')) {
                    $table->integer('credentials_order')->default(6);
                }

                // 7. Products Section
                if (! Schema::hasColumn('homepage_settings', 'products_status')) {
                    $table->boolean('products_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'products_order')) {
                    $table->integer('products_order')->default(7);
                }

                // 8. Service Models Section
                if (! Schema::hasColumn('homepage_settings', 'service_models_status')) {
                    $table->boolean('service_models_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'service_models_order')) {
                    $table->integer('service_models_order')->default(8);
                }

                // 9. Dual Perspective Section
                if (! Schema::hasColumn('homepage_settings', 'perspective_status')) {
                    $table->boolean('perspective_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'perspective_order')) {
                    $table->integer('perspective_order')->default(9);
                }

                // 10. Contact Section
                if (! Schema::hasColumn('homepage_settings', 'contact_status')) {
                    $table->boolean('contact_status')->default(true);
                }
                if (! Schema::hasColumn('homepage_settings', 'contact_order')) {
                    $table->integer('contact_order')->default(10);
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('homepage_settings')) {
            Schema::table('homepage_settings', function (Blueprint $table) {
                $columns = [
                    'hero_status', 'hero_order',
                    'about_status', 'about_order',
                    'services_status', 'services_order',
                    'videos_status', 'videos_order',
                    'testimonials_status', 'testimonials_order',
                    'credentials_status', 'credentials_order',
                    'products_status', 'products_order',
                    'service_models_status', 'service_models_order',
                    'perspective_status', 'perspective_order',
                    'contact_status', 'contact_order',
                ];

                foreach ($columns as $col) {
                    if (Schema::hasColumn('homepage_settings', $col)) {
                        $table->dropColumn($col);
                    }
                }
            });
        }
    }
};
