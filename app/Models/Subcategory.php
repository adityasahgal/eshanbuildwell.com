<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Subcategory extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'subcategories';
    protected $fillable = [];

    public function categories()
    {
        return $this->hasOne('App\Models\Category', 'id', 'cid');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service', 'subcategory_id', 'id');
    }

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'uid');
    }
}
