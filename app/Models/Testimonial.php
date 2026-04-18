<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'uid');
    }

    /**
     * Extracts initials from the name (e.g. "Rajesh Sharma" -> "RS")
     */
    public function getAvatarInitialsAttribute()
    {
        $words = explode(' ', trim($this->name));
        $initials = '';
        foreach ($words as $w) {
            $initials .= mb_substr($w, 0, 1);
        }
        return mb_strtoupper(mb_substr($initials, 0, 2));
    }
}
