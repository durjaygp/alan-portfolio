<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('homepage_settings', 'hero_stats')) {
                $table->json('hero_stats')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'video_title')) {
                $table->string('video_title')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'video_heading')) {
                $table->string('video_heading')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'video_description')) {
                $table->text('video_description')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'video_items')) {
                $table->json('video_items')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'testimonial_title')) {
                $table->string('testimonial_title')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'testimonial_heading')) {
                $table->string('testimonial_heading')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'testimonial_items')) {
                $table->json('testimonial_items')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'credential_title')) {
                $table->string('credential_title')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'credential_heading')) {
                $table->string('credential_heading')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'credential_items')) {
                $table->json('credential_items')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            //
        });
    }
};
