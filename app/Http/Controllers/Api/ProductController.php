<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Validator;

class ProductController extends Controller
{
    
   
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'name' => 'required',
            'detail' => 'required'
        ]);

        if($valid->fails())
        {
            return response()->json(['error'=> $valid->errors()], 401);
        }
        
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->detail;
        if($product->save()) 
        {
            return [ 'Result'=> "product has been saved"];
        }
    }
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->detail = $request->detail;
        if($product->save()) 
        {
            return [ 'Result'=> "product has been Updated"];
        }
    }
}