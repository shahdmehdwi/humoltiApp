<?php

namespace App\Models\Customer;

use App\Models\Admin\Category;
use App\Models\Admin\Payment;
use App\Models\Driver\Driver;
use App\orderTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable= [
        'customerId',
        'driverId',
        'categorytId',
        'paymentId',
        'pickUpLocation',
        'deliveryLocation',
        'distance',
        'price',


    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerId');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driverId');
    }

    
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

   public function payment()
    {
        return $this->belongsTo(Payment::class, 'paymentId');
    }

  

    public static function calculatePrice($distance) {

        return $distance * 5;
     
    }
        
 
}



