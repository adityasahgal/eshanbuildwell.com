<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calculator_enquiries', function (Blueprint $table) {
            $table->id();

            // User info
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);

            // Project inputs
            $table->string('project_type')->default('Residential');
            $table->decimal('plot_length', 10, 2)->default(0);
            $table->decimal('plot_width', 10, 2)->default(0);
            $table->decimal('plot_area', 10, 2)->default(0);
            $table->decimal('builtup_per_floor', 10, 2)->default(0);
            $table->integer('total_floors')->default(1);
            $table->decimal('total_builtup', 10, 2)->default(0);
            $table->string('basement_required')->default('No');
            $table->decimal('basement_area', 10, 2)->default(0);

            // Quality selections
            $table->string('structure_quality')->default('Standard');
            $table->string('finishing_quality')->default('Standard');
            $table->string('mep_quality')->default('Standard');
            $table->string('facade_type')->default('Standard');
            $table->string('external_dev')->default('Standard');
            $table->string('location')->default('Urban');
            $table->string('contingency')->default('No');

            // Cost breakdown (stored in rupees)
            $table->decimal('structure_cost', 14, 2)->default(0);
            $table->decimal('basement_cost', 14, 2)->default(0);
            $table->decimal('finishing_cost', 14, 2)->default(0);
            $table->decimal('mep_cost', 14, 2)->default(0);
            $table->decimal('facade_cost', 14, 2)->default(0);
            $table->decimal('external_cost', 14, 2)->default(0);
            $table->decimal('location_factor', 14, 2)->default(0);
            $table->decimal('contingency_amount', 14, 2)->default(0);
            $table->decimal('total_cost', 14, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculator_enquiries');
    }
};
