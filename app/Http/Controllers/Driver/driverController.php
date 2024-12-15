<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\advertisementResource;
use App\Models\Admin\Advertisement;
use Illuminate\Http\Request;

class driverController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
