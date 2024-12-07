<?php

namespace App\Models\Driver;

use App\Models\Admin\Vechile;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable=[
        'name',
        'vechileId',
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
    
    public function vechile()
    {
        return $this->belongsTo(Vechile::class, 'vechileId', 'id');
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
