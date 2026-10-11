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
        Schema::create('homepage2_settings', function (Blueprint $table) {
            $table->id();

            // Section Statuses (Toggles)
            $table->boolean('hero_status')->default(true);
            $table->boolean('proof_status')->default(true);
            $table->boolean('story_status')->default(true);
            $table->boolean('problem_status')->default(true);
            $table->boolean('services_status')->default(true);
            $table->boolean('training_status')->default(true);
            $table->boolean('why_alan_status')->default(true);
            $table->boolean('videos_status')->default(true);
            $table->boolean('credentials_status')->default(true);
            $table->boolean('gallery_status')->default(true);
            $table->boolean('blog_status')->default(true);
            $table->boolean('contact_status')->default(true);

            // Section Sort Orders
            $table->integer('hero_order')->default(1);
            $table->integer('proof_order')->default(2);
            $table->integer('story_order')->default(3);
            $table->integer('problem_order')->default(4);
            $table->integer('services_order')->default(5);
            $table->integer('training_order')->default(6);
            $table->integer('why_alan_order')->default(7);
            $table->integer('videos_order')->default(8);
            $table->integer('credentials_order')->default(9);
            $table->integer('gallery_order')->default(10);
            $table->integer('blog_order')->default(11);
            $table->integer('contact_order')->default(12);

            // 1. Hero Section
            $table->string('hero_badge_text')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_primary_button_text')->nullable();
            $table->string('hero_primary_button_url')->nullable();
            $table->string('hero_secondary_button_text')->nullable();
            $table->string('hero_secondary_button_url')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_card_title')->nullable();
            $table->string('hero_card_subtitle')->nullable();
            $table->json('hero_audiences')->nullable();

            // 2. Proof Strip Section
            $table->string('proof_heading')->nullable();
            $table->json('proof_stats')->nullable();
            $table->json('proof_media_logos')->nullable();

            // 3. Story Bridge Section
            $table->string('story_badge')->nullable();
            $table->string('story_title')->nullable();
            $table->string('story_image')->nullable();
            $table->text('story_image_quote')->nullable();
            $table->text('story_p1')->nullable();
            $table->text('story_p2')->nullable();
            $table->text('story_highlight_quote')->nullable();
            $table->text('story_p3')->nullable();
            $table->string('story_button_text')->nullable();
            $table->string('story_button_url')->nullable();

            // 4. Consultation Gap / Problem Section
            $table->string('problem_badge')->nullable();
            $table->string('problem_title')->nullable();
            $table->string('problem_subtitle')->nullable();
            $table->text('problem_description')->nullable();
            $table->string('problem_box_title')->nullable();
            $table->json('problem_items')->nullable();
            $table->text('problem_bottom_callout')->nullable();

            // 5. How I Can Help / Core Services Section
            $table->string('services_badge')->nullable();
            $table->string('services_title')->nullable();
            $table->text('services_description')->nullable();
            $table->json('services_items')->nullable();

            // 6. Training & Education Section
            $table->string('training_badge')->nullable();
            $table->string('training_title')->nullable();
            $table->text('training_description')->nullable();
            $table->string('training_button_text')->nullable();
            $table->string('training_button_url')->nullable();
            $table->json('training_items')->nullable();

            // 7. Why Alan? Section
            $table->string('why_badge')->nullable();
            $table->string('why_title')->nullable();
            $table->text('why_subtitle')->nullable();
            $table->json('why_items')->nullable();

            // 8. Watch & Learn / Videos Section
            $table->string('videos_badge')->nullable();
            $table->string('videos_title')->nullable();
            $table->text('videos_description')->nullable();
            $table->json('video_items')->nullable();

            // 9. Awards, Certifications & Media Section
            $table->string('credentials_badge')->nullable();
            $table->string('credentials_title')->nullable();
            $table->text('credentials_description')->nullable();
            $table->json('awards_items')->nullable();
            $table->json('media_items')->nullable();
            $table->json('credential_showcase_items')->nullable();

            // 10. Gallery Showcase Section
            $table->string('gallery_badge')->nullable();
            $table->string('gallery_title')->nullable();
            $table->text('gallery_description')->nullable();
            $table->string('gallery_button_text')->nullable();
            $table->string('gallery_button_url')->nullable();

            // 11. Knowledge Library / Blog Section
            $table->string('blog_badge')->nullable();
            $table->string('blog_title')->nullable();
            $table->text('blog_description')->nullable();
            $table->string('blog_button_text')->nullable();
            $table->string('blog_button_url')->nullable();

            // 12. Intake Contact Section
            $table->string('contact_badge')->nullable();
            $table->string('contact_title')->nullable();
            $table->text('contact_description')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_whatsapp_url')->nullable();
            $table->string('contact_form_title')->nullable();
            $table->text('contact_form_subtitle')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage2_settings');
    }
};
