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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id')->nullable();
            $table->string('citizen_card')->nullable();
            $table->string('education_level')->nullable();
            $table->string('description')->nullable();
            $table->string('time_tutor')->nullable();
            $table->integer('status')->nullable();
            $table->integer('DistrictID')->nullable();
            $table->string('Certificate', 1000)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
