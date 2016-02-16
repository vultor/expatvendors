<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Cart;
use Mail;
use App\Product;
use App\Order;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        if(Cart::count() == 0) {
            return redirect()->intended('/buy')->with([
                'flash_message' => 'Your cart is currently empty.',
                'flash_message_important' => true
            ]);
        }
        else {
            $products = Cart::content();
            $vendor_id = $products->first()->options->product->user_id;
            $vendor = User::find($vendor_id);

            return view('cart', compact('products', 'vendor'));
        }
    }
    
    public function add($product_id, CartRequest $request) {
        // get quantity, product, and vendor.
        $qty = $request->input('qty');    	
		$product = Product::find($product_id);
        $vendor_id = $product->user_id;
        $vendor = User::find($vendor_id);

        // check if the cart is empty and add product.
        if(Cart::count() == 0) {
            Cart::add(array('id' => $product->id, 'name' => $product->title, 'qty' => $qty, 'price' => $product->price, 'options' => array('product' => $product)));
        }

        // if products in cart, check if same vendor.
        else {
            $cart = Cart::content();

            // if same vendor, add to cart. can only order from one vendor at a time.
            if($cart->first()->options->product->user_id == $vendor_id) {
                Cart::add(array('id' => $product->id, 'name' => $product->title, 'qty' => $qty, 'price' => $product->price, 'options' => array('product' => $product)));
            }

            // if different vendor, empty the cart then add product.
            else {
                Cart::destroy();

                Cart::add(array('id' => $product->id, 'name' => $product->title, 'qty' => $qty, 'price' => $product->price, 'options' => array('product' => $product)));
            }

        }
    	
        // get contents of cart and return cart view.
    	$products = Cart::content();
    	return view('cart', compact('products', 'vendor'));
    }

    public function update(CartRequest $request) {

	    	$product_id = $request->input('product_id');
			$product = Product::find($product_id);
            $vendor = User::find($product->user_id);

            $rowId = $request->input('product_rowid');
	    	$qty = $request->input('qty');

            if($qty == 0) {
                Cart::remove($rowId);
            }
            else {
                Cart::update($rowId, $qty);
            }
    	
    	$products = Cart::content();

        if(Cart::count() == 0) {
            session()->flash('flash_message', 'Your cart is empty.');
        }
        else {
            session()->flash('flash_message', 'Your cart has been updated.');
        }
        
    	return view('cart', compact('products', 'vendor'));
    }

    public function success(Request $request) {
        // Find the vendor. Store the info in orders table.
        // TODO: send email.
        $products = Cart::content();
        $buyer = Auth::user();

        foreach($products as $product) {
            $order = Order::create([
                            'buyer_id' => $buyer->id,
                            'product_id' => $product->id,
                            'quantity' => $product->qty,
                            'subtotal' => $product->subtotal,
                            'status' => 'open']);   
        }
        
        $vendor = User::find($request->vendor_id);

        Mail::send('emails.order', compact('products', 'vendor', 'buyer'), function ($m) use ($buyer, $vendor) {
            $m->to($buyer->email, $buyer->name)->subject('Your Order for '. $vendor->vendor_name . ' from ExpatVendors.com');
        });

        Cart::destroy();
        // session()->flash('flash_message', 'Your order has been placed.');
        // session()->flash('flash_message_important', true);
        return view('success', compact('products', 'vendor', 'buyer'));
    }

}
