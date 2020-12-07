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
     * @param  \App\Models\ProductController  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductController  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
	{
		if ($request->has('code') && $request->get('code') != $product->code) {
			$product->code = $request->get('code');
		}
		if ($request->has('name') && $request->get('name') != $product->name) {
			$product->name = $request->get('name');
		}
		if ($request->has('price') && $request->get('price') != $product->price) {
			$product->price = $request->get('price');
		}
		if ($request->has('description') && $request->get('description') != $product->description) {
			$product->description = $request->get('description');
		}
 		if ($request->has('size') && $request->get('size') != $product->code) {
			$product->size = $request->get('size');
		}
 		if ($request->has('color') && $request->get('color') != $product->color) {
			$product->color = $request->get('color');
		}
 		if ($request->has('min_age') && $request->get('min_age') != $product->min_age) {
			$product->min_age = $request->min_age;
		}
 		if ($request->has('max_age') && $request->get('max_age') != $product->code) {
			$product->max_age = $request->max_age;
		}
 	    if ($request->has('images') && $request->get('images') != $product->images) {
			$product->images = $request->images;
		}
		$product->save();
        session()->flash('status', 'Product has been uodated');
		return redirect(route('products.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductController  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
		$product->delete();
		session()->flash('status', 'Product has been deleted');
		return redirect(route('products.index'));
    }
}
