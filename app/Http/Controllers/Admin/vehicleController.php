<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\vehicleRequest;
use App\Http\Resources\Admin\vehicleResource;
use App\Models\Admin\Vehicle;
use Illuminate\Http\Request;

class vehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $vehicles=Vehicle::all();
      return vehicleResource::collection($vehicles);


    }

    public function store(Request $request)
    {
        $input= $request->validate([
            'type'=>'required','string',
            'licensePlate'=>'required','string',
        ]);
        
        Vehicle::create($input);
        return response()->json(['message'=>'creating vehicle successfully']);
    }

    public function show(string $id)
    {
        $vehicle=Vehicle::findOrFail($id);
        return response()->json(['data'=> $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(vehicleRequest $request, string $id)
     {

     $input=$request->validated();
     $vehicle= Vehicle::findOrFail($id);
     $vehicle->update($input);

     return response()->json(['message'=>'vehicle is updated successfully']);
   }

   
    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
     {
         $vehicle= Vehicle::findOrFail($id);
         $vehicle->delete();
         return response()->json(['message'=>'vehicle is deleted Successfully']);
     }

 
 }  
