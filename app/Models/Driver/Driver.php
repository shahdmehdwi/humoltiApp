<?php

namespace App\Models\Driver;

use App\Models\Admin\Vehicle;
use App\Models\Customer\Order;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable implements JWTSubject
{
    protected $fillable=[
        'name',
        'vehicleId',
        'email',
        'password',
        'otp',
        'imageUrl',
        'phoneNumber',
        'SecondaryNumber',
        'location',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'vehicleId','id');
    }

    public function orderDriver()
    {
        return $this->hasMany(Order::class, 'driverId');
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
