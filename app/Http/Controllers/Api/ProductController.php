<?php

namespace App\Http\Controllers\Api;

use Image;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use  App\Models\Product;
use phpDocumentor\Reflection\Types\Null_;

class ProductController extends Controller

{


 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query()
        ->name($request)
        ->price($request)
        ->category($request);        
        return $products->paginate(16);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product($request->all());
        if ($request->get('img')) {
            $image = $request->get('img');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($request->get('img'))->save(public_path("images/") . $name);
            $product->img = "/images/" . $name;
        }
        $product->save();
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        if ($request->get('img')) {
            $image = $request->get('img');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($request->get('img'))->save(public_path("images/") . $name);
            $product->img = "/images/" . $name;
        }
        unset($request["img"]);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        return 'delete ok';
    }
  
}
