<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageEntry extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'image_path', 'bedrooms', 'bathrooms', 'price'];
    protected $casts = [
        'image_path' => 'array', // <-- cast image_path as an array
    ];
}
