<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'name', 
        'email', 
        'phone', 
        'address', 
        'city', 
        'state', 
        'zip', 
        'status', 
        'message', 
        'size',
        'tracking_num',
        'payment_image',
        'shipping_no',
    ];

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
}
