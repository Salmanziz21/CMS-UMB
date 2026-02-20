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
        Schema::table('userinterfaces', function (Blueprint $table) {
            $table->string('image_logo')->nullable()->change();
            $table->string('image_background')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userinterfaces', function (Blueprint $table) {
            $table->string('image_logo')->nullable(false)->change();
            $table->string('image_background')->nullable(false)->change();
        });
    }
};
