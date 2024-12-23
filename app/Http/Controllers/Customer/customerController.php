<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\customerRequest;
use App\Http\Resources\Customer\customerResource;
use App\Models\Customer\Customer;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class customerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function registeration(Request $request)
    {
       //validation
       $input= $request->validate([
           'name'=>'required',
           'email'=>'required','email',
           'password'=>'required',
           'phoneNumber'=>'required',
           'secondaryNumber'=>'nullable',
           'imageUrl'=>'nullable',
           'location'=>'required',

           
       ]);
       $customer=Customer::where('email',$input['email'])->first();
    
       if(!$customer) 
    {
        Customer::create($input);
        return response()->json(['message'=>'Registeration is added successfully']);

    }
       return response()->json(['message'=>'Customer is found']);
    
    }
    
       public function forgetPassword(Request $request)
    {
           $input= $request->validate(['email'=>['required','email']]);
           $customer=Customer::where('email',$input)->first();
           
           if(!$customer)
           {
               return response()->json(['message'=>'customer not found']);
           }
    
           $otp=rand(10000,9999);
           $customer->otp=$otp;
           $customer->save();
           return response()->json(['message'=>'success   '.$otp]);
    
       }
    
    
       public function resetPassword(Request $request)
    
    {
        $input = $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
            'newPassword' => 'required',
            'confirmPassword' => 'required','confirmed',
        ]);
    
        $customer = Customer::where('email', $input['email'])->where('otp', $input['otp'])->first();
    
        if (!$customer) {
            return response()->json(['message' => 'Customer not found or OTP is incorrect']);
        }
    
        $customer->password = Hash::make($input['newPassword']);
        $customer->otp = null; // Clear the OTP after successful password reset
        $customer->save();
    
        return response()->json(['message' => 'Password reset successfully']);
    }
    



    public function index()
    {

        $customer=Customer::where('customerId',auth('customer')->id())->get();
        return response()->json(['customer'=> $customer]);

    }
    
    
     
         public function show(string $id)
         {
             $customer=Customer::findOrFail($id);
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
          * Remove the specified resource from storage.
          */
          public function destroy(string $id)
          {
            $customer=Customer::where('customerId',auth('customer')->id())->findOrFail($id);    
              $customer->delete();
              return response()->json(['message'=>'customer is deleted Successfully']);
          }
    
      /**public function store(Request $request)
         {
             $input= $request->validate([
                 'name'=>['required'],
                 'email'=>['required','email'],
                 'password'=>['required'],
                 'imageUrl'=>['nullable'],
                 'phoneNumber'=>['required'],
                 'SecondaryNumber' => ['nullable', 'string'],
                 'location'=>['required'],
             ]);
             Customer::create($input);
             return response()->json(['message'=>'creating customer successfully']);
         } */
    
    }

