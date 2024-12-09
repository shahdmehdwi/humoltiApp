<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\adminRequest;
use App\Http\Resources\Admin\adminResource;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
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