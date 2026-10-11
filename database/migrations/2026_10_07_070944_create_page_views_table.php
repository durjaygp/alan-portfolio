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
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('url', 500);
            $table->string('path', 255)->index();
            $table->string('route_name', 100)->nullable()->index();
            $table->string('page_title', 255)->nullable();
            $table->string('ip_address', 45)->nullable()->index();
            $table->text('user_agent')->nullable();
            $table->string('device_type', 20)->default('desktop')->index(); // desktop, mobile, tablet, bot
            $table->string('browser', 50)->nullable()->index();
            $table->string('platform', 50)->nullable()->index();
            $table->text('referer')->nullable();
            $table->string('referer_host', 100)->nullable()->index();
            $table->string('session_id', 100)->nullable()->index();
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->timestamp('viewed_at')->index();
            $table->timestamps();

            $table->index(['viewed_at', 'path']);
            $table->index(['viewed_at', 'device_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
