<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('ribbon')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('email')->nullable();
            $table->text('skills')->nullable();
            $table->integer('position')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('uid')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
