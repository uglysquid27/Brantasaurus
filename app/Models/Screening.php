<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaLengkap',
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
        'lainnya'
    ];

}
