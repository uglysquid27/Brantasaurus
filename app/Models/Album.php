<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //use HasFactory;
    // protected $table='albums';
    // protected $primaryKey='Nim';

    protected $fillable = [
        'AlbumName','GroupName','Detail','Date_released','Category',
    ];
}
