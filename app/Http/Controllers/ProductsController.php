<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use BrowserDetect;
use Input;
use Redirect;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
     
     
    protected $rules = [
		'name' => ['required', 'min:3'],
		'slug' => ['required'],
	];
    public function index()
    {
        //
        $result = BrowserDetect::detect();
		$products = Product::all();
		return view('products.index', ['products' => $products,'b' =>$result]);
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('products.create');
	}
 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		
		$this->validate($request, $this->rules);
		$input = Input::all();
		Product::create( $input );
 
		return Redirect::route('products.index')->with('message', 'Product created');
		
	}
 
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Product $product
	 * @return Response
	 */
	public function show(Product $product)
	{
			
		
		return view('products.show', compact('product'));
	}
 
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Product $product
	 * @return Response
	 */
	public function edit(Product $product)
	{
			
		
	
			
		return view('products.edit', compact('product'));
	}
 
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Product $product
	 * @return Response
	 */
	public function update(Product $product,  Request $request)
	{
		$this->validate($request, $this->rules);
		
		//
		
		$input = array_except(Input::all(), '_method');
		$product->update($input);
		return Redirect::route('products.show', $product->slug)->with('message', 'Product updated.');
				
	}
 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product $product
	 * @return Response
	 */
	public function destroy(Product $product)
	{
		//
		$product->delete();
 
		return Redirect::route('products.index')->with('message', 'Product deleted.');
	}
}
