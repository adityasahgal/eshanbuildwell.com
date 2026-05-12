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
        Schema::create('bim_training_contents', function (Blueprint $table) {
            $table->id();
            
            // Meta
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // Hero
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_fee')->nullable();
            $table->string('hero_duration')->nullable();
            $table->string('hero_timing')->nullable();
            $table->string('hero_batch_start')->nullable();

            // About
            $table->string('about_title')->nullable();
            $table->text('about_description_1')->nullable();
            $table->text('about_description_2')->nullable();
            $table->string('about_image')->nullable();

            // Learn Section
            $table->string('learn_section_title')->nullable();
            $table->text('learn_section_desc')->nullable();
            $table->json('learn_modules')->nullable(); // Array of modules

            // Tools & Software Section
            $table->string('tools_title')->nullable();
            $table->text('tools_desc')->nullable();
            $table->json('revit_desc_list')->nullable();
            $table->json('other_tools_list')->nullable();
            
            // Trainer Details
            $table->string('trainer_name')->nullable();
            $table->string('trainer_role')->nullable();
            $table->string('trainer_image')->nullable();
            $table->json('trainer_bullets')->nullable();

            // Program Outcomes
            $table->json('program_outcomes')->nullable();

            // Certificate Section
            $table->string('certificate_section_title')->nullable();
            $table->text('certificate_section_desc')->nullable();
            $table->string('certificate_org_name')->nullable();
            $table->string('certificate_title')->nullable();
            $table->string('certificate_awarded_to_text')->nullable();
            $table->text('certificate_body_text')->nullable();
            $table->string('certificate_course_title')->nullable();
            $table->string('certificate_course_tools')->nullable();
            $table->string('certificate_signature_name')->nullable();
            $table->string('certificate_signature_role')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bim_training_contents');
    }
};
