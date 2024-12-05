<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable= [
        'title',
        'description',
        'price',
        'priceNow',
        'discount',
        'imageUrl',
   ];
}
