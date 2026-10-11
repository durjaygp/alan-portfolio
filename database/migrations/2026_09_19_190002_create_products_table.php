<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // care, trichology, training, tools
            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('original_price', 10, 2)->nullable();
            $table->string('badge')->nullable(); // Best Seller, New, Available Soon
            $table->string('icon')->default('🧴');
            $table->string('image')->nullable();
            $table->text('short_description');
            $table->json('included_items')->nullable();
            $table->text('overview_instructions')->nullable();
            $table->text('ingredients_safety')->nullable();
            $table->json('faqs')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
