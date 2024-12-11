<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\customerResource;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers= Customer::all();
        return customerResource::collection($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $input= $request->validate([
                'name'=>'required','string',
                'email'=>'required','email',
                'password'=>'required','string',
                'phoneNumber'=>'required','string',
                'secondaryNumber'=>'nullable','string',
                'imageUrl'=>'nullable',
                'location'=>'required','string',

            ]);

            Customer::create($input);
            return response()->json(['message'=>'creating customer successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
