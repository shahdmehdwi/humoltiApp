<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class adminController extends Controller
{
    public function registeration(Request $request)
    {
       //validation
       $input= $request->validate([
           'name'=>'required',
           'email'=>'required','email',
           'password'=>'required',
       ]);
       $input['email']='admin_'.$input['email'];
       $admin=Admin::where('email',$input['email'])->first();
    
       if(!$admin) 
    {
       Admin::create($input);
       return response()->json(['message'=>'Registeration is added successfully']);
    
    }
       return response()->json(['message'=>'Admin is found']);
    
    }
 

  public function forgetPassword(Request $request)
{
      $input= $request->validate(['email'=>['required','email']]);
      $admin=Admin::where('email',$input)->first();
      
      if(!$admin)
      {
          return response()->json(['message'=>'admin not found']);
      }

      $otp=rand(10000,9999);
      $admin->otp=$otp;
      $admin->save();
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

   $admin = Admin::where('email', $input['email'])->where('otp', $input['otp'])->first();

   if (!$admin) {
       return response()->json(['message' => 'Admin not found or OTP is incorrect']);
   }

   $admin->password = Hash::make($input['newPassword']);
   $admin->otp = null; // Clear the OTP after successful password reset
   $admin->save();

   return response()->json(['message' => 'Password reset successfully']);
}
   

}