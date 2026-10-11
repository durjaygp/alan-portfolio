<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('homepage_settings', 'hero_badge_icon')) {
                $table->string('hero_badge_icon')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'hero_badge_title')) {
                $table->string('hero_badge_title')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'hero_badge_subtitle')) {
                $table->string('hero_badge_subtitle')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'footer_description')) {
                $table->text('footer_description')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'footer_phone')) {
                $table->string('footer_phone')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'footer_location')) {
                $table->string('footer_location')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'footer_email')) {
                $table->string('footer_email')->nullable();
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
