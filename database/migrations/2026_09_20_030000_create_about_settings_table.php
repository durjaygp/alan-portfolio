<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();

            // 1. Banner
            $table->string('banner_title')->nullable();
            $table->text('banner_lead')->nullable();

            // 2. Origin Story
            $table->string('origin_label')->nullable();
            $table->string('origin_heading')->nullable();
            $table->text('origin_para_1')->nullable();
            $table->text('origin_para_2')->nullable();
            $table->text('origin_quote')->nullable();
            $table->text('origin_para_3')->nullable();
            $table->text('origin_para_4')->nullable();
            $table->text('origin_para_5')->nullable();
            $table->string('origin_photo_1_image')->nullable();
            $table->string('origin_photo_1_caption')->nullable();
            $table->string('origin_photo_2_image')->nullable();
            $table->string('origin_photo_2_caption')->nullable();

            // 3. Career Timeline
            $table->string('timeline_label')->nullable();
            $table->string('timeline_heading')->nullable();
            $table->json('timeline_items')->nullable();

            // 4. COVID Story
            $table->string('covid_label')->nullable();
            $table->string('covid_heading')->nullable();
            $table->text('covid_para_1')->nullable();
            $table->text('covid_para_2')->nullable();
            $table->text('covid_quote')->nullable();
            $table->text('covid_para_3')->nullable();
            $table->text('covid_para_4')->nullable();

            // 5. Philosophy
            $table->string('philosophy_label')->nullable();
            $table->string('philosophy_heading')->nullable();
            $table->json('philosophy_items')->nullable();

            // 6. CTA Section
            $table->string('cta_heading')->nullable();
            $table->text('cta_text')->nullable();
            $table->string('cta_button_label')->nullable();
            $table->string('cta_button_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_settings');
    }
};
