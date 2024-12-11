<?php

namespace App\Models\Admin;

use App\Models\Customer\Order;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[
        'name',
    ];


 
    public function orderPayment()
    {
        return $this->hasMany(Order::class, 'paymentId');
    }
}
