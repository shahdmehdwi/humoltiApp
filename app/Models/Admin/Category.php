<?php

namespace App\Models\Admin;

use App\Models\Customer\Order;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable= [
        'type'
    ];

    public function orderCategory()
    {
        return $this->hasMany(Order::class, 'categoryId');
    }
}
