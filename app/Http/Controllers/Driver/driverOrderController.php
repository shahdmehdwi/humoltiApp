<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\orderResource;
use App\Models\Customer\Order;
use Illuminate\Http\Request;

class driverOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function accept()
    {
       $order=Order::where('driverId',auth('driver')->id())->latest()->first();
       if($order){
           $order->status='accept';
           $order->save();
       }
       return response()->json(['status'=> 'success']);

    }

    public function reject()
    {
       $order=Order::where('driverId',1)->latest()->first();
       if($order){
           $order->status='faild';
           $order->save();
       }
       return response()->json(['status'=> 'faild']);

    }
    public function index()
    {
        $orders=Order::where('driverId',auth('driver')->id())->get();
        return response()->json(['My Orders'=> $orders]);
    }

    public function show(string $id)
    {
        $order= Order::where('driverId',auth('driver')->id())->findOrFail($id);
        return response()->json(['data'=> $order]);
    }


}

