<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('project_info')->nullable();
            $table->tinyInteger('rating')->default(5);
            $table->text('quote');
            $table->integer('position')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('uid')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
