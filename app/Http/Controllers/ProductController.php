<?php

namespace App\Http\Controllers;

use App\Http\Requests\addProductRequest;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProduct(Request $request)
    {
        return product::all();
    }
    public function addProduct(addProductRequest $request)
    {
        // dd(Auth::user());
        
        // $validator = Validator::make($request->all(), [
        //     'product_price' => 'required|numeric',
            
        // ],[
        //     'product_price.required' => 'the price field is required.',
        //     'product_price.integer' => 'The id must be an number.',]);

        // if ($validator->fails()) {
        //     return response($validator->errors(), 400);
        // }
        $product = product::create(
                    [
                        'product_name' => $request->product_name,
                        'product_description' => $request->product_description,
                        'product_price' => $request->product_price
                    ]);

        // $product = new product();
        // $product->product_name = $request->product_name;
        // $product->product_description = $request->product_description;
        // $product->product_price = $request->product_price;
        // $product->save();
        return $product;
    }

    public function updateProduct(Request $request, $id)
    {
        $product = product::find($id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->save();
        return $product;
    }
    public function deleteProduct($id)
    {
        $product = product::find($id);
        $product->delete();
        return $product;
    }
}
