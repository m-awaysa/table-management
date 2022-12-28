<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        return view('tables.product');
    }
    public function viewEdit(Request $request)
    {
        
        $product =  Product::find($request->product);
   
        return view('edit.product', [
            'product'=>$product
        ]);
    }

    public function edit(UpdateProductRequest $request,Product $product)
    {
        
        $product->update($request->validated());

        return redirect()->route('product')->with('success','updated');
    }

    public function delete(Request $request)
    {
      $product=  Product::find($request->product);
    
      Product::find($request->product)->delete();

         return redirect()->route('product')->with('success','deleted');
    }
}
