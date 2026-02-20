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
        Schema::create('studyprograms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('accreditation', ['Unggul','Baik Sekali','Baik'])->default('Baik Sekali');
            $table->LongText('description');
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('profilestudy')->nullable();
            $table->longText('history')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studyprograms');
    }
};
