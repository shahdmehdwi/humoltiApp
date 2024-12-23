<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\driverRequest;
use App\Http\Resources\Driver\driverResource;
use Illuminate\Http\Request;
use App\Models\Driver\Driver;

class adminDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
     {
       $drivers= Driver::all();
        return driverResource::collection($drivers);
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



      public function registeration(Request $request)
     {
        //validation
        $input= $request->validate([
            'vehicleId'=> 'required | numeric | exists:vehicles,id',
            'name'=>'required',
            'email'=>'required','email',
            'password'=>'required',
            'imageUrl'=>'nullable',
            'phoneNumber'=>'required',
            'SecondaryNumber' => 'nullable', 'string',
            'location'=>'required',
        ]);
        $input['email']='driver_'.$input['email'];
        $driver=Driver::where('email',$input['email'])->first();
     
        if(!$driver) 
     {
         Driver::create($input);
         return response()->json(['message'=>'Registeration is added successfully']);
 
     }
        return response()->json(['message'=>'Driver is found']);
     
     }
     
  }  