<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    // use HasFactory;

    protected $fillable = [
        'product_name',
        'product_price',
        'product_description',
        'product_detail',
        'product_image'
    ];
}
