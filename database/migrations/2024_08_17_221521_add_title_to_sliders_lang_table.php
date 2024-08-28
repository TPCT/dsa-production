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
        Schema::table('slider_slides', function (Blueprint $table) {
            $table->dropColumn('link');
            $table->dropColumn('image_id');
            $table->dropColumn('mobile_image_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders_lang', function (Blueprint $table) {
            //
        });
    }
};
