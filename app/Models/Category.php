<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'alamat',
        'phone',
        'nik',
        'work',
        'born',
        'gender',
        'batuk',
        'bb',
        'demam',
        'lemas',
        'keringat',
        'sesak',
        'getah',
        'jangkit',
        'lainnya',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
