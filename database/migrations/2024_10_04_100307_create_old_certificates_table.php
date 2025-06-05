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
        Schema::create('old_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panchayat_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->foreign('panchayat_id')->references('id')->on('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('old_certificates');
    }
};
