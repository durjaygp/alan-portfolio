<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('homepage_settings', 'awards_items')) {
                $table->json('awards_items')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'media_items')) {
                $table->json('media_items')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'credential_showcase_items')) {
                $table->json('credential_showcase_items')->nullable();
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
