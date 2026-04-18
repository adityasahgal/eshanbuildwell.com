<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [];

    public function getServicePointsArrayAttribute()
    {
        if (empty($this->service_card_points)) {
            return [];
        }

        return collect(preg_split('/\r\n|\r|\n/', $this->service_card_points))
            ->map(fn($point) => trim($point))
            ->filter()
            ->values()
            ->all();
    }

    public function getResolvedThumbnailUrlAttribute()
    {
        if (!empty($this->thumbnail_img)) {
            return url('storage/' . $this->thumbnail_img);
        }

        return 'https://images.unsplash.com/photo-1541888081-0113f8d29864?w=700&q=80';
    }



    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'uid');
    }
}
