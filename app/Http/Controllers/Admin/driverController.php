<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\driverRequest;
use App\Http\Resources\Driver\driverResource;
use Illuminate\Http\Request;
use App\Models\Driver\Driver;

class driverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
     {
       $drivers= Driver::all();
        return driverResource::collection($drivers);
     }
 
     public function store(Request $request)
     {
         $input= $request->validate([

             'vehicleId'=> 'required | numeric | exists:vehicles,id'  ,
             'name'=>['required'],
             'email'=>['required','email'],
             'password'=>['required'],
             'imageUrl'=>['nullable'],
             'phoneNumber'=>['required'],
             'SecondaryNumber' => ['nullable', 'string'],
             'location'=>['required'],
         ]);
         $input['email']='driver_'.$input['email'];
         Driver::create($input);
         return response()->json(['message'=>'creating driver successfully']);
     }
 
     public function show(string $id)
     {
         $driver=Driver::findOrFail($id);
         return response()->json(['data'=> $driver]);
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
      public function destroy(string $id)
      {
          $driver= Driver::findOrFail($id);
          $driver->delete();
          return response()->json(['message'=>'driver is deleted Successfully']);
      }
  }  