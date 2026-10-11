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
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('category')->default('Hair Transformations');
            $table->string('image')->nullable();
            $table->string('before_image')->nullable();
            $table->string('after_image')->nullable();
            $table->text('description')->nullable();
            $table->string('client_name')->nullable();
            $table->string('service_type')->nullable();
            $table->string('timeframe')->nullable();
            $table->string('badge')->nullable();
            $table->boolean('is_before_after')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};
