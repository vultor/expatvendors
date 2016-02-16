<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StoresController extends Controller
{
    /**
	* Show all products.
	* 
	* 
	* @return Response
	*/
	public function index()
	{
		$vendors = User::has('products')
						->groupBy('id')
						->get();

		return view('stores', compact('vendors'));
	}
}
