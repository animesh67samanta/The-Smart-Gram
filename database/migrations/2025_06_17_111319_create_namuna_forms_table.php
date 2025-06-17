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
        Schema::create('namuna_forms', function (Blueprint $table) {
            $table->id();
            $table->year('start_year_before')->nullable();
            $table->year('end_year_before')->nullable();
            $table->year('start_year_after')->nullable();
            $table->year('end_year_after')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('namuna_forms');
    }
};
