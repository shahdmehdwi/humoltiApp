<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\vechileRequest;
use App\Http\Resources\Admin\vechileResource;
use App\Models\Admin\Vechile;
use Illuminate\Http\Request;

class vechileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $vechiles=Vechile::all();
      return vechileResource::collection($vechiles);


    }

    public function store(Request $request)
    {
        $input= $request->validate([
            'type'=>'required','string',
            'licensePlate'=>'required','string',
        ]);
        
        Vechile::create($input);
        return response()->json(['message'=>'creating vechile successfully']);
    }

    public function show(string $id)
    {
        $vechile=Vechile::findOrFail($id);
        return response()->json(['data'=> $vechile]);
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(vechileRequest $request, string $id)
     {

     $input=$request->validated();
     $vechile= Vechile::findOrFail($id);
     $vechile->update($input);

     return response()->json(['message'=>'vechile is updated successfully']);
   }

   
    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
     {
         $vechile= Vechile::findOrFail($id);
         $vechile->delete();
         return response()->json(['message'=>'vechile is deleted Successfully']);
     }

 
 }  
