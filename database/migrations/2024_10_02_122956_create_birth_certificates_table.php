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
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panchayat_id')->nullable();
            $table->string('childname')->nullable();
            $table->date('dob')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('address_at_birth')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('registration_number')->nullable();
            $table->text('remarks')->nullable();
            $table->date('issuedate')->nullable();
            $table->string('number')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('panchayat_id')->references('id')->on('panchayats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_certificates');
    }
};
