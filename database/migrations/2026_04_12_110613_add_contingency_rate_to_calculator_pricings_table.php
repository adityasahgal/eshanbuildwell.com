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
        Schema::table('calculator_pricings', function (Blueprint $table) {
            $table->decimal('contingency_rate', 5, 2)->default(5.00)->after('basement_multiplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calculator_pricings', function (Blueprint $table) {
            $table->dropColumn('contingency_rate');
        });
    }
};
