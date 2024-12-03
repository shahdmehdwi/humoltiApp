<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\paymentRequest;
use App\Http\Resources\Admin\paymentResource;
use App\Models\Admin\Payment;
use Illuminate\Http\Request;


class paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $payments=Payment::all();
      return paymentResource::collection($payments);


    }

    public function store(Request $request)
    {
        $input= $request->validate([
            'name'=>['required','string'],
        
        ]);
        
        Payment::create($input);
        return response()->json(['message'=>'creating payment successfully']);
    }

    public function show(string $id)
    {
        $payment=Payment::findOrFail($id);
        return response()->json(['data'=> $payment]);
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(paymentRequest $request, string $id)
     {

     $input=$request->validated();
     $payment= Payment::findOrFail($id);
     $payment->update($input);

     return response()->json(['message'=>'payment is updated successfully']);
   }

   
    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
     {
         $payment= Payment::findOrFail($id);
         $payment->delete();
         return response()->json(['message'=>'payment is deleted Successfully']);
     }

 
 }  
