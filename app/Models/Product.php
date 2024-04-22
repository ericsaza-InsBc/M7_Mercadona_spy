<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'slug',
        'price',
        'published',
        'image_url',
        'share_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
