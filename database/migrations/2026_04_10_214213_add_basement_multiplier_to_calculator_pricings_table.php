<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('calculator_pricings', function (Blueprint $table) {
            // Basement is charged at (structure_rate × basement_multiplier) per sqft
            // Default 1.5 means basement = 1.5× normal structure rate
            $table->decimal('basement_multiplier', 4, 2)->default(1.50)->after('location_hill');
        });
    }

    public function down(): void
    {
        Schema::table('calculator_pricings', function (Blueprint $table) {
            $table->dropColumn('basement_multiplier');
        });
    }
};
