<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('products');

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('product_categories')->nullOnDelete();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('original_price', 10, 2)->nullable();
            $table->string('badge')->nullable(); // Best Seller, New, Guide
            $table->string('icon')->default('🧴')->nullable();
            $table->text('image')->nullable();
            $table->text('thumbnail')->nullable();
            $table->json('images')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('included_items')->nullable();
            $table->longText('overview_instructions')->nullable();
            $table->longText('ingredients_safety')->nullable();
            $table->longText('faqs')->nullable();

            // SEO Content
            $table->longText('seo_description')->nullable();
            $table->longText('seo_tags')->nullable();
            $table->longText('seo_keywords')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
