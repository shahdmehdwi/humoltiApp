<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\orderResource;
use Illuminate\Http\Request;
use App\Models\Customer\Order;
use GuzzleHttp\Promise\Create;

class orderController extends Controller
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input= $request->validate([
            'pickUpLocation'=>'required',
            'deliveryLocation'=>'required',
            'distance'=>'required|numeric',
            
        ]);
        
        $order= new Order();
        
        $input['price']=$order->calculatePrice( $input['distance']);
        Order::Create($input);
     return response()->json(['message'=> 'tmam']);
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input=$request->validated();
        $order= Order::findOrFail($id);
        $order->update($input);
   
        return response()->json(['message'=>'order is updated successfully']);
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
