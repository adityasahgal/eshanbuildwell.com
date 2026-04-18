<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category', 100);
            $table->string('location');
            $table->string('project_type');
            $table->string('status_label', 100)->default('Completed');
            $table->string('image');
            $table->string('image_alt')->nullable();
            $table->string('url_link')->nullable();
            $table->integer('position')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('uid')->nullable();
            $table->timestamps();
        });

        DB::table('project_sliders')->insert([
            [
                'title' => 'A32 P-04, Phii2 Greater Noida UP - 201315',
                'category' => 'Residential',
                'location' => 'Greater Noida, UP',
                'project_type' => 'Residential Project',
                'status_label' => 'Completed',
                'image' => 'assets/images/Project1.jpg',
                'image_alt' => 'A32 P-04 Greater Noida',
                'url_link' => url('projects'),
                'position' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'G202, Sector 63, Noida',
                'category' => 'Commercial',
                'location' => 'Sector 63, Noida',
                'project_type' => 'Commercial Project',
                'status_label' => 'Completed',
                'image' => 'assets/images/Project2.jpg',
                'image_alt' => 'G202 Sector 63 Noida',
                'url_link' => url('projects'),
                'position' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dept of Science & Technology',
                'category' => 'Government',
                'location' => 'Delhi, India',
                'project_type' => 'Major Institutional Project',
                'status_label' => 'Phase 1 Done',
                'image' => 'assets/images/Project3.jpg',
                'image_alt' => 'Dept of Science Technology',
                'url_link' => url('projects'),
                'position' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ocus 24K Mall, Gurugram',
                'category' => 'Commercial',
                'location' => 'Gurugram, Haryana',
                'project_type' => 'Commercial Landmark',
                'status_label' => 'Completed',
                'image' => 'assets/images/Project4.jpg',
                'image_alt' => 'Ocus 24K Mall Gurugram',
                'url_link' => url('projects'),
                'position' => 4,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gallexie 91 Mall, Gurugram',
                'category' => 'Mall',
                'location' => 'Gurugram, Haryana',
                'project_type' => 'Structure Completed',
                'status_label' => 'Completed',
                'image' => 'assets/images/Project06.jpg',
                'image_alt' => 'Gallexie 91 Mall Gurugram',
                'url_link' => url('projects'),
                'position' => 5,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('project_sliders');
    }
};
