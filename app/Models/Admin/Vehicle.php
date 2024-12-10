<?php

namespace App\Models\Admin;

use App\Http\Resources\Admin\vehicleResource;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    
    protected $fillable= [
        'type',
        'licensePlate',
    ];


}
