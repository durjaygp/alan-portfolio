<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('homepage_settings', 'contact_business_types')) {
                $table->json('contact_business_types')->nullable();
            }
            if (! Schema::hasColumn('homepage_settings', 'contact_primary_interests')) {
                $table->json('contact_primary_interests')->nullable();
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
