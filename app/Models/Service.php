<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [];

    public function categories()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function subcategories()
    {
        return $this->hasOne('App\Models\Subcategory', 'id', 'subcategory_id');
    }

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'uid');
    }
}
