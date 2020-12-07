<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $products = $product->all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'images' => $request->get('images', null),
            'description' => $request->get('description', null),
            'color' => $request->get('color', null),
            'size' => $request->get('size', null),
            'min_age' => $request->get('min_age', null),
            'max_age' => $request->get('max_age', null),
        ]);
        session()->flash('status', 'New Product has been added');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductController  $productController
     * @return \Illuminate\Http\Response
     */
    public function show(ProductController $productController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductController  $productController
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductController $productController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductController  $productController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductController $productController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductController  $productController
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductController $productController)
    {
        //
    }
}
