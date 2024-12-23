<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Admin\Advertisement;
use Illuminate\Http\Request;

class driverAdvertisementController extends Controller
{
    public function show(string $id)
    {
        $advertisement= Advertisement::findOrFail($id);
        return response()->json(['data'=> $advertisement]);
    }
}
