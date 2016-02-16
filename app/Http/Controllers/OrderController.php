<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Order;
use App\User;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function vendor()
	{
		$vendor = User::find(Auth::user()->id);
		// get the orders of the user
		$orders = $vendor->vendor_orders()
                		->orderBy('created_at', 'desc')
                		->get();

		foreach($orders as $order) {
			$order['product'] = Product::where('id', $order->product_id)->first();
			$order['buyer'] = User::where('id', $order->buyer_id)->first();
		}
		
		return view('orders/vendor', compact('orders'));
	}

	public function buyer()
	{
		$user = User::find(Auth::user()->id);
		// get the orders of the user
		$orders = $user->orders()
                		->orderBy('created_at', 'desc')
						->get();
		foreach($orders as $order) {
			$product = Product::where('id', $order->product_id)->first();
			$order['product'] = $product;
		}
		return view('orders/buyer', compact('orders'));
	}
}
