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
        Schema::create('death_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panchayat_id')->nullable();
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->date('gender')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('death_place')->nullable();
            $table->string('father_or_husband_name')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('remarks')->nullable();
            $table->date('issuedate')->nullable();

            $table->timestamps();

            // Foreign key constraint

            $table->foreign('id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('death_certificates');
    }
};
