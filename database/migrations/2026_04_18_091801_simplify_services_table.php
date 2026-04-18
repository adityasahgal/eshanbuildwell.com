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
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'category_id',
                'subcategory_id',
                'code',
                'photos',
                'image_alt',
                'price',
                'mrp_price',
                'discount',
                'gst',
                'tax',
                'slug',
                'h1_tag',
                'meta_title',
                'meta_description',
                'keywords',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('subcategory_id')->nullable();
            $table->string('code')->nullable();
            $table->text('photos')->nullable();
            $table->string('image_alt')->nullable();
            $table->float('price')->nullable();
            $table->float('mrp_price')->nullable();
            $table->float('discount')->nullable();
            $table->float('gst')->nullable();
            $table->float('tax')->nullable();
            $table->string('slug')->nullable();
            $table->string('h1_tag')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keywords')->nullable();
        });
    }
};
