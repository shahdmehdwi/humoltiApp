<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Advertisement;
use Illuminate\Http\Request;

class customerAdvertisementController extends Controller
{
    public function show(string $id)
    {
        $advertisement= Advertisement::findOrFail($id);
        return response()->json(['data'=> $advertisement]);
    }
}
