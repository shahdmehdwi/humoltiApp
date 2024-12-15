<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\adminRequest;
use App\Http\Resources\Admin\adminResource;
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

}
   return response()->json(['message'=>'created admin email successfully']);

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
   $input=$request->validate([
       'email'=>'required','email',
       'otp'=>'required','numeric',
       'newPassword'=>'required',
       'confirmPassword'=>'required','confirmed']);
       $admin=Admin::where('email',$input(['email']))->where(['otp'])->first();
       
       if(!$admin) 
   {
          return response()->json(['message'=>'admin not found or maybe you otp is wrong']);
       }

           $admin->password=Hash::make($input['newPassword']);
           $admin->otp=null;
           $admin->save();
           return response()->json(['message'=>'reset your password correctly']);
  
}
    
     public function index()
     {
       $admins= Admin::all();
        return adminResource::collection($admins);

          /*$admins=Admin::all();
       return response()->json(['data'=>$admins]);
       return response()->json(['message'=>  $admins]); */
     }
 
     public function store(Request $request)
     {
         $input= $request->validate([
             'name'=>['required'],
             'email'=>['required','email'],
             'password'=>['required']
         ]);
         $input['email']='admin_'.$input['email'];
         Admin::create($input);
         return response()->json(['message'=>'creating admin successfully']);
     }
 
     public function show(string $id)
     {
         $admin=Admin::findOrFail($id);
         return response()->json(['data'=> $admin]);
     }
 
     /**
      * Update the specified resource in storage.
      */
      public function update(adminRequest $request, string $id)
      {

     $input= $request->validated();
      $admin= Admin::findOrFail($id);
      $admin->update($input);

      return response()->json(['message'=>'admin is updated successfully']);
    }

    
     /**
      * Remove the specified resource from storage.
      */
      public function destroy(string $id)
      {
          $admin= Admin::findOrFail($id);
          $admin->delete();
          return response()->json(['message'=>'admin is deleted Successfully']);
      }


}

  
  