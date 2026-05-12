<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BimTrainingContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BimTrainingContent::updateOrCreate(
            ['id' => 1],
            [
                'meta_title' => 'BIM (Revit) Professional Training Program | Eshan Buildwell',
                'meta_description' => 'Learn complete BIM 3D, 4D, and 5D workflow with live project training using Autodesk Revit, Navisworks, and DiRoots at Eshan Buildwell.',
                'meta_keywords' => 'BIM Training, Revit Training, Navisworks, DiRoots, 3D BIM, 4D Planning, 5D Costing, Eshan Buildwell',

                'hero_title' => 'BIM (Revit)<br>Professional Training',
                'hero_description' => 'Learn complete BIM workflow from 3D design to 4D planning and 5D costing with live project training using Autodesk Revit, Navisworks, and DiRoots. The program is designed for civil engineers, architects, and working professionals who want practical, industry-ready skills.',
                'hero_fee' => '₹4,999/-',
                'hero_duration' => '3 Months',
                'hero_timing' => 'Tues/Thur/Sat',
                'hero_batch_start' => '28th April',

                'about_title' => 'About the Training Program',
                'about_description_1' => 'This BIM training program is built around real project-based learning. You will understand how to develop building models, coordinate planning, generate quantity takeoff, and support costing workflows using the same digital tools used in modern construction execution.',
                'about_description_2' => 'The course covers complete workflow from design (3D) to planning (4D) and costing (5D) — giving you end-to-end practical BIM skills that are industry-ready from day one.',
                'about_image' => 'assets/images/Project4.jpg',

                'learn_section_title' => 'What You Will Learn',
                'learn_section_desc' => 'Structured modules focused on architecture, structure, planning, and costing so learners can move from software basics to complete BIM workflow understanding.',
                'learn_modules' => [
                    [
                        'icon' => 'bi-building',
                        'title' => 'Architecture',
                        'subtitle' => '3D BIM Modeling',
                        'items' => [
                            'Architectural Modelling (Walls, Doors, Windows, Floors, Roofs, Stairs)',
                            'Materials & Visualization',
                            'Annotation & Documentation',
                            'Site & Topography',
                            'Families (Parametric)'
                        ]
                    ],
                    [
                        'icon' => 'bi-bezier2',
                        'title' => 'Structure',
                        'subtitle' => '3D Structural Workflow',
                        'items' => [
                            'Structural Columns & Beams',
                            'Foundations (Isolated, Raft, Pile Cap)',
                            'Structural Floors',
                            'Rebar Modelling',
                            'Structural Detailing'
                        ]
                    ],
                    [
                        'icon' => 'bi-clock-history',
                        'title' => 'Planning',
                        'subtitle' => '4D Coordination',
                        'items' => [
                            'Project Scheduling (Time)',
                            '4D Simulation with Revit Plugins',
                            'Resource Planning',
                            'Progress Tracking',
                            'Construction Sequence'
                        ]
                    ],
                    [
                        'icon' => 'bi-cash-coin',
                        'title' => 'Costing',
                        'subtitle' => '5D BIM Workflow',
                        'items' => [
                            'Quantity Takeoff (QTO)',
                            'Cost Estimation',
                            '5D BIM with Plugins',
                            'BOQ & Cost Reports',
                            'Budget vs Actual Tracking'
                        ]
                    ]
                ],

                'tools_title' => 'Tools & Software',
                'tools_desc' => 'Industry tools covered during the BIM workflow training.',
                'revit_desc_list' => [
                    'Complete BIM modeling for architecture and structure',
                    'Family creation, documentation, and schedules',
                    'Real project based workflow understanding'
                ],
                'other_tools_list' => [
                    'Autodesk Navisworks',
                    'DI Roots (5D Costing)',
                    'DS Costing'
                ],
                
                'trainer_name' => 'Er. Gagandeep Rajput',
                'trainer_role' => 'Construction & BIM Specialist',
                'trainer_image' => 'assets/images/ceo.jpeg',
                'trainer_bullets' => [
                    '15+ Years Major BIM Projects for Top Constructors',
                    '5+ Years as Revit Architecture Trainer',
                    'BIM Estimation & Costing Expert'
                ],

                'program_outcomes' => [
                    ['icon' => 'bi-diagram-3-fill', 'text' => 'Develop complete BIM model (3D • 4D • 5D)'],
                    ['icon' => 'bi-file-earmark-text-fill', 'text' => 'Generate working drawings & BOQs'],
                    ['icon' => 'bi-people-fill', 'text' => 'Perform basic BIM coordination']
                ],

                'certificate_section_title' => 'Program Certificate',
                'certificate_section_desc' => 'Every student who completes the BIM Professional Training Program receives an official Eshan Buildwell certificate recognising their skills in 3D, 4D, and 5D BIM workflow.',
                'certificate_org_name' => 'ESHAN BUILDWELL INDIA',
                'certificate_title' => 'Certificate of Completion',
                'certificate_awarded_to_text' => 'has been awarded to',
                'certificate_body_text' => 'Has successfully completed the <strong>BIM Professional Training Program</strong> conducted by Eshan Buildwell India with dedication, hard work, and outstanding performance in all practical sessions and project-based assignments.',
                'certificate_course_title' => 'BIM Professional Training Program',
                'certificate_course_tools' => 'Architecture & Structure (3D) · Planning (4D) · Costing (5D)',
                'certificate_signature_name' => 'Gagandeep',
                'certificate_signature_role' => 'Er. Gagandeep Rajput<br>Founder & Director<br>Eshan Buildwell India',
            ]
        );
    }
}
