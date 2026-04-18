<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSlider extends Model
{
    use HasFactory;

    protected $table = 'project_sliders';

    protected $guarded = [];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'uid');
    }

    public function getResolvedImageUrlAttribute()
    {
        if (empty($this->image)) {
            return '';
        }

        if (str_starts_with($this->image, 'uploads/')) {
            return url('storage/' . $this->image);
        }

        return asset($this->image);
    }
}
