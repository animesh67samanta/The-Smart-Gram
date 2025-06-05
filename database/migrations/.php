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
        Schema::table('home_taxes', function (Blueprint $table) {
            Schema::table('hometaxes', function (Blueprint $table) {
                // Add the columns
                $table->unsignedBigInteger('panchayat_id')->nullable();
                $table->unsignedBigInteger('property_id')->nullable();

                // Add foreign keys with ON DELETE and ON UPDATE CASCADE
                $table->foreign('panchayat_id')
                    ->references('id')
                    ->on('panchayats')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                $table->foreign('property_id')
                    ->references('id')
                    ->on('properties')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_taxes', function (Blueprint $table) {
            // Drop the foreign keys first
            $table->dropForeign(['panchayat_id']);
            $table->dropForeign(['property_id']);

            // Then drop the columns
            $table->dropColumn('panchayat_id');
            $table->dropColumn('property_id');
        });
    }
};
