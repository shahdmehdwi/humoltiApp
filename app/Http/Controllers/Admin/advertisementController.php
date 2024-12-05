<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\advertisementRequest;
use App\Http\Resources\Admin\advertisementResource;
use App\Models\Admin\Advertisement;
use Illuminate\Http\Request;

class advertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements=Advertisement::all();
        return advertisementResource::collection($advertisements);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(advertisementRequest $request)
    {
        $input= $request->validated();
        Advertisement::create($input);
        return response()->json(['message'=>'advertisement is added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $advertisement= Advertisement::findOrFail($id);
        return response()->json(['data'=> $advertisement]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(advertisementRequest $request, string $id)
    {
      $input= $request->validated();
      $advertisement= Advertisement::findOrFail($id);
      $advertisement->update($input);

      return response()->json(['message'=>'advertisement is updated successfully']);
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy(string $id)
    {
       $advertisement= Advertisement::findOrFail($id);
       $advertisement->delete();
       return response()->json(['message'=>'advertisement is deleted successfully']);
    }
}