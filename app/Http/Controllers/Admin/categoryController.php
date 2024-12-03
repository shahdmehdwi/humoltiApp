<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\categoryRequest;
use App\Http\Resources\Admin\categoryResource;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return categoryResource::collection($categories);

    }
    

    public function selectByType(Request $request) {
          
        $query= Category::query();
        if (request()->has('type'))
        {
            $query->where('type','LIKE',$request->type,'%');
        }
        $categories=$query->get();
        return response()->json(['data'=>$categories]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input= $request->validate(['type'=>'required']);
        Category::create($input);
        return response()->json(['message'=>'category is added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category= Category::findOrFail($id);
        return response()->json(['data'=> $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryRequest $request, string $id)
    {
      $input= $request->validated();
      $category= Category::findOrFail($id);
      $category->update($input);

      return response()->json(['message'=>'category is updated successfully']);
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy(string $id)
    {
       $category= Category::findOrFail($id);
       $category->delete();
       return response()->json(['message'=>'category is deleted successfully']);
    }
}
