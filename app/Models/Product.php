<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sluggable;

    // protected $table = 'products';

    protected $with = ['category','tag'];
    
    protected $fillable = [
        'category_id',
        'product_name',
        'slug',
        'quantity',
        'price',
        'sell_price',
        'description',
        'small_description',
        'image',
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where('product_name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query->when($filters['tag'] ?? false, function($query, $tag){
            return $query->whereHas('tag', function($query) use ($tag){
                $query->where('slug', $tag);
            });
        });
        
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->belongsToMany(Tag::class, 'product_tag');
    } 

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]

        ];
    }

}
