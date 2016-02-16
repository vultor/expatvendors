<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Image;
use File;
use App\User;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;

class ProductsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

	/**
	* Show all products.
	* 
	* 
	* @return Response
	*/
	public function index()
	{
		$id = Auth::user()->id;
		$products = DB::table('products')
						->where('user_id', '=', $id)
						->get();
		return view('products/index', compact('products'));
	}

	public function create()
	{
		return view('products/create');
	}

	/**
	* Save a new product.
	* 
	* @param ProductRequest $request
	* @return Response
	*/

	public function store(ProductRequest $request)
	{
		// validation through ProductRequest first

		Auth::user()->products()->create($request->all());

		$product = $request->all();

		if($request->file('image'))
        {
        	$image = $request->file('image');
        	$filename  = $product->id . time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('product/images/' . $filename);

			$product->update(['image' => $filename]);

            Image::make($image->getRealPath())
            				->widen(100, function ($constraint) {
							    	$constraint->upsize();
								})
							->save($path);
        }

		// the other way to flash a message.
		// session()->flash('flash_message', 'Your product has been created.');

		return redirect('products')->with([
				'flash_message' => 'Your product has been created.',
				'flash_message_important' => true
			]);
	}

	public function edit($id)
	{
		$product = Product::findOrFail($id);

		return view('products.edit', compact('product'));
	}

	public function update($id, ProductRequest $request)
	{
		$product = Product::findOrFail($id);

		if($request->file('image'))
        {
        	if($product->image) {
        		$old_image = public_path('product/images/' . $product['image']);
        		File::delete($old_image);
        	}

			$product->update($request->all());

        	$new_image = $request->file('image');
        	$filename  = $product->id . time() . '.' . $new_image->getClientOriginalExtension();

            $path = public_path('product/images/' . $filename);

			$product->update(['image' => $filename]);

            Image::make($new_image->getRealPath())
            				->widen(100, function ($constraint) {
							    	$constraint->upsize();
								})
							->save($path);
        }
        else {
			$product->update($request->all());
        }

		return redirect('products');
	}

	public function show($id)
	{
		$product = Product::findOrFail($id);
		$vendor = DB::table('users')
						->where('id', '=', $id)
						->get();

		return view('products.view', compact('product', 'vendor'));
	}

}

