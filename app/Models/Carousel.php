<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Carousel extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'promo',
        'slug',
        'desc',
        'image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function product(){
    //     return $this->hasMany(Product::class);
    // }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'promo'
            ]
        ];
    }
}
