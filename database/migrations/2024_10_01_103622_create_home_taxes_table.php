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
        Schema::create('home_taxes', function (Blueprint $table) {
            $table->id();
            $table->integer('square_meter')->nullable;
            $table->integer('open_plot_readireckoner_rate')->nullable;
            $table->integer('builtup_area_readireckoner_rate')->nullable;
            $table->integer('depreciation')->nullable;
            $table->integer('usage_rate')->nullable;
            $table->integer('home_tax_rate')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_taxes');
    }
};
