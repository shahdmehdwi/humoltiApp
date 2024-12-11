<?php

namespace App\Models\Customer;

use App\Models\Customer\Order;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
        'name',
        'email',
        'password',
        'imageUrl',
        'phoneNumber',
        'secondaryNumber',
        'location',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    

    public function orderCustomer()
    {
        return $this->hasMany(Order::class, 'customerId');
    }
    

   
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
