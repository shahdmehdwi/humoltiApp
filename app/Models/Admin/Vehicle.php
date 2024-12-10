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

    public function mapInto(vehicleResource $resource, $request = null)
    {
        return $resource->additional([
            // Add any additional data or transformations here
        ]);
    }
}
