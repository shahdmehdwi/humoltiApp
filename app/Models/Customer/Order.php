<?php

namespace App\Models\Customer;

use App\orderTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable= [

        'pickUpLocation',
        'deliveryLocation',
        'distance',
        'price',

    ];


  

    public static function calculatePrice($distance) {

        return $distance * 5;
     
    }
        
 
}



