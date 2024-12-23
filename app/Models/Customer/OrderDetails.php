<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable=[
        'orderId',
        'pickUpLocation',
        'deliveryLocation',
        'distance',
        'price',
    ];
}
