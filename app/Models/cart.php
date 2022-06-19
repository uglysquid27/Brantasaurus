<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phoneNumber',
        'address',
        'product_name',
        'quantity',
        'price',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
