<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\customerRequest;
use App\Http\Resources\Customer\customerResource;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;

class adminCustomerController extends Controller
{
    public function index()
    {
        $customers=Customer::all();
        return customerResource::collection($customers);
    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer= Customer::findOrFail($id);
        return response()->json(['data'=> $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(customerRequest $request, string $id)
    {
      $input= $request->validated();
      $customer= Customer::findOrFail($id);
      $customer->update($input);

      return response()->json(['message'=>'customer is updated successfully']);
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy(string $id)
    {
       $customer= Customer::findOrFail($id);
       $customer->delete();
       return response()->json(['message'=>'Customer is deleted successfully']);
    }
}