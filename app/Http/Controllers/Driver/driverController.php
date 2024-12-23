<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\driverRequest;
use App\Models\Driver\Driver;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class driverController extends Controller
{

    /**
     * Display a listing of the resource.
     */
   
    
       public function forgetPassword(Request $request)
    {
           $input= $request->validate(['email'=>['required','email']]);
           $driver=Driver::where('email',$input)->first();
           
           if(!$driver)
           {
               return response()->json(['message'=>'driver not found']);
           }
    
           $otp=rand(10000,9999);
           $driver->otp=$otp;
           $driver->save();
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
    
        $driver = Driver::where('email', $input['email'])->where('otp', $input['otp'])->first();
    
        if (!$driver) {
            return response()->json(['message' => 'Customer not found or OTP is incorrect']);
        }
    
        $driver->password = Hash::make($input['newPassword']);
        $driver->otp = null; // Clear the OTP after successful password reset
        $driver->save();
    
        return response()->json(['message' => 'Password reset successfully']);
    }
        
     
     
         /**
          * Update the specified resource in storage.
          */
          public function update(driverRequest $request, string $id)
          {
    
          $input= $request->validated();
          $driver= Driver::findOrFail($id);
          $driver->update($input);
    
          return response()->json(['message'=>'driver is updated successfully']);
        }
    
        
         /**
          * Remove the specified resource from storage.
          */
 
    
    }
