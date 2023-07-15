<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    public $fillable = [
        "name",
        "description",
        "url",
        "image",
        "release_date",
        "slug",
    ];
    use HasFactory;

    public function getImageUrlAttribute()
    {
        return $this->image? asset($this->image) : asset('default-image.jpg');
    }

    public function getRouteKeyName(): string
        {
            return 'slug';
        }
}
