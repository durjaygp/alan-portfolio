<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('homepage_settings')) {
            Schema::create('homepage_settings', function (Blueprint $table) {
                $table->id();
                $table->string('hero_subtitle')->nullable();
                $table->string('hero_name')->nullable();
                $table->string('hero_designation')->nullable();
                $table->text('hero_description')->nullable();
                $table->string('hero_image')->nullable();
                $table->string('hero_button_label')->nullable();
                $table->string('hero_button_url')->nullable();
                $table->string('hero_secondary_button_label')->nullable();
                $table->string('hero_secondary_button_url')->nullable();

                $table->string('about_title')->nullable();
                $table->string('about_heading')->nullable();
                $table->longText('about_description')->nullable();
                $table->string('about_image')->nullable();
                $table->string('about_button_label')->nullable();
                $table->string('about_button_url')->nullable();

                $table->string('contact_title')->nullable();
                $table->string('contact_heading')->nullable();
                $table->text('contact_paragraph')->nullable();

                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
