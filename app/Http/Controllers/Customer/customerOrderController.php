<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\orderRequest;
use App\Http\Resources\Customer\orderResource;
use App\Jobs\AutoFailOrderJob;
use Illuminate\Http\Request;
use App\Models\Customer\Order;
use App\Models\Customer\OrderDetails;

class customerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  

    public function index()
    {
       $orders=Order::where('customerId',auth('customer')->id())->get()->load('orderDetails');
       $orderId= Order::latest()->first()->id;
       AutoFailOrderJob::dispatch($orderId)->delay(delay: now()->addMinutes(value: 1));
       return response()->json(['data'=>$orders]);
   }


    
    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $order= Order::where('customerId',auth('customer')->id())->findOrFail($id);
        return response()->json(['data'=> $order]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->validate([
            'driverId'=>['required'],
            'categoryId'=>['required'],
            'paymentId'=>['required'],
            'pickUpLocation'=>['required'],
            'deliveryLocation'=>['required'],
            'distance'=>['required']
        ]);

        $orderId= Order::latest()->first();
        if(!$orderId){
            $orderId=1;
        }
        else{
            $orderId= $orderId->id +1;
        }

        OrderDetails::create([
            'orderId'=>$orderId,
            'pickUpLocation'=>$input['pickUpLocation'],
            'deliveryLocation'=>$input['deliveryLocation'],
            'distance'=>$input['distance'],
            'price'=> Order::calculatePrice($input['distance'])
        ]);
        Order::create([
           'customerId'=>auth('customer')->id(),
           'driverId'=>$input['driverId'],
           'categorytId'=>$input['categoryId'],
           'paymentId'=>$input['paymentId'],
           'status'=>'waiting'
        ]);
        AutoFailOrderJob::dispatch($orderId)->delay(delay: now()->addMinutes(value: 1));
        return response()->json(['message'=>'order is loading']);

    }
  

    /**
     * Update the specified resource in storage.
     */
    public function update(orderRequest $request, string $id)
    {
        $input=$request->validated();
        $order= Order::findOrFail($id);
        $order->update($input);
   
        return response()->json(['message'=>'order is updated successfully']);
    }

}
