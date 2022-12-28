<?php

namespace App\Http\Controllers\table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('tables.category');
    }
    public function viewEdit(Request $request)
    {
        
        $category =  Category::find($request->category);
   
        return view('edit.category', [
            'category'=>$category
        ]);
    }

    public function edit(UpdateCategoryRequest $request,Category $category)
    {
        
        $category->update($request->validated());

        return redirect()->route('category')->with('success','updated');
    }

    public function delete(Request $request)
    {
      $category=  Category::find($request->category);
        if( $category->product)
        {
            return redirect()->route('category')->with('error','cant delete category that has products');
        }else
        Category::find($request->category)->delete();

         return redirect()->route('category')->with('success','deleted');
    }
}
