<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name')->nullable();
            $table->string('property_name')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->nullable(); // This can be a boolean (e.g., active/inactive)
            $table->timestamps(); // Automatically creates 'created_at' and 'updated_at' columns
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
