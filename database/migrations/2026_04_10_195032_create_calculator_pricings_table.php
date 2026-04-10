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
        Schema::create('calculator_pricings', function (Blueprint $table) {
            $table->id();
            
            // Structure Rates
            $table->integer('structure_basic')->default(1100);
            $table->integer('structure_standard')->default(1450);
            $table->integer('structure_premium')->default(1900);
            
            // Finishing Rates
            $table->integer('finishing_basic')->default(500);
            $table->integer('finishing_standard')->default(800);
            $table->integer('finishing_premium')->default(1250);
            
            // MEP Rates
            $table->integer('mep_basic')->default(200);
            $table->integer('mep_standard')->default(350);
            $table->integer('mep_premium')->default(550);
            
            // Facade Rates
            $table->integer('facade_basic')->default(105);
            $table->integer('facade_standard')->default(180);
            $table->integer('facade_premium')->default(280);
            
            // External Rates
            $table->integer('external_basic')->default(0);
            $table->integer('external_standard')->default(80);
            $table->integer('external_premium')->default(150);
            
            // Location Multipliers
            $table->decimal('location_metro', 5, 2)->default(1.1);
            $table->decimal('location_urban', 5, 2)->default(1.0);
            $table->decimal('location_hill', 5, 2)->default(1.2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculator_pricings');
    }
};
