<?php

namespace App\Models\Driver;

use App\Models\Admin\Vehicle;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable=[
        'name',
        'vehicleId',
        'email',
        'password',
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
