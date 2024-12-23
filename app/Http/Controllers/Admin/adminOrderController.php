<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\orderResource;
use App\Models\Customer\Order;
use Illuminate\Http\Request;

class adminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::all();
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order= Order::findOrFail($id);
        $order->delete();
        return response()->json(['message'=>'order is deleted Successfully']);
    }
}
