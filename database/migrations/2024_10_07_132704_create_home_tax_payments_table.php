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
        Schema::create('home_tax_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panchayat_id')->nullable();
            $table->unsignedBigInteger('property_id')->nullable();
            $table->string('year')->nullable();
            $table->string('given_tax_amount')->nullable();
            $table->string('due_tax_amount')->nullable();
            $table->foreign('panchayat_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_tax_payments');
    }
};
