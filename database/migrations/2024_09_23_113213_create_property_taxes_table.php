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
        Schema::create('property_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade'); // Foreign key to Property table
            $table->string('street_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('property_users')->nullable();
            $table->string('property_description')->nullable();
            $table->string('usage_type')->nullable();
            $table->decimal('area', 8, 2)->nullable(); // Assuming this is a decimal field
            $table->decimal('tax_rate_per_sqm', 8, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->text('remarks')->nullable(); // To store additional remarks
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_taxes');
    }
};
