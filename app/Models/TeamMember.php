<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TeamMember extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'uid');
    }

    public function getResolvedImageUrlAttribute()
    {
        if ($this->image && str_starts_with($this->image, 'uploads/')) {
            return asset('storage/' . $this->image);
        }
        
        return $this->image ? asset($this->image) : asset('assets/images/team-placeholder.png');
    }
}
