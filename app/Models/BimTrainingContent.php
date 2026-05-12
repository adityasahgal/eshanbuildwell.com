<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BimTrainingContent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'learn_modules' => 'array',
        'revit_desc_list' => 'array',
        'other_tools_list' => 'array',
        'trainer_bullets' => 'array',
        'program_outcomes' => 'array',
    ];
}
