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
        Schema::create('marriage_certificates', function (Blueprint $table) {

                $table->id();
                $table->unsignedBigInteger('panchayat_id');
                $table->string('groom_name');
                $table->string('groom_image')->nullable();
                $table->text('groom_address');
                $table->string('groom_religion')->nullable();
                $table->string('groom_nationality')->nullable();
                $table->string('groom_gurdian_name')->nullable();
                $table->text('groom_gurdian_address')->nullable();
                $table->string('bride_name');
                $table->string('bride_image')->nullable();
                $table->text('bride_address');
                $table->string('bride_religion')->nullable();
                $table->string('bride_nationality')->nullable();
                $table->string('bride_gurdian_name')->nullable();
                $table->text('bride_gurdian_address')->nullable();
                $table->date('date_of_marriage')->nullable();
                $table->string('registration_number')->unique();
                $table->date('registration_date');
                $table->date('issue_date')->nullable();
                $table->timestamps(); // Includes created_at and updated_at fields

                // Foreign key constraint with ON DELETE CASCADE
                $table->foreign('panchayat_id')
                      ->references('id')
                      ->on('admins')
                      ->onDelete('cascade');
            });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_certificates');
    }
};
