<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('homepage_settings', 'service_models_title')) {
                $table->string('service_models_title')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'service_models_heading')) {
                $table->string('service_models_heading')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'service_models_items')) {
                $table->json('service_models_items')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'perspective_title')) {
                $table->string('perspective_title')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'perspective_heading')) {
                $table->string('perspective_heading')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'perspective_quote')) {
                $table->text('perspective_quote')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'perspective_items')) {
                $table->json('perspective_items')->nullable();
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
