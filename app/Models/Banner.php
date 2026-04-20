<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = ['name', 'page_slug', 'url_link', 'banner', 'tag_line', 'image_alt', 'position', 'status', 'uid'];

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'uid');
    }
}
