<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\orderResource;
use App\Models\Customer\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders= Order::all();
        return orderResource::collection($orders);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order=Order::findOrFail($id);
        return response()->json(['data'=> $order]);
    }

  
    

}

