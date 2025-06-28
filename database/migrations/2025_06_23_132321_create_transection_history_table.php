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
        Schema::create('transection_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_taxes_id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('panchayat_id');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['success', 'pending', 'failed'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transection_history');
    }
};
