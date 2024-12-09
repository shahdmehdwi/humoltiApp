<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    
    protected $fillable= [
        'type',
        'licensePlate',
    ];


}
