<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Driver\Driver;
use Illuminate\Database\Eloquent\Model;

class Vechile extends Model
{
    use HasFactory;
    
    protected $fillable= [
        'driverId',
        'licensePlate',
        'type'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driverId', 'id');
    }
    

}
