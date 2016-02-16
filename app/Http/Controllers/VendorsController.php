<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VendorsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['only' => 'edit', 'update']);
	}

    public function show($id)
	{
		$vendor = User::findOrFail($id);
		$products = DB::table('products')
						->where('user_id', '=', $id)
						->get();

		return view('vendors.view', compact('vendor', 'products'));
	}
    //
    public function edit($id)
	{
		$vendor = User::findOrFail($id);

		return view('vendors.edit', compact('vendor'));
	}

	public function update($id, Request $request)
	{
		$vendor = User::findOrFail($id);

		$vendor->update($request->all());
		
		session()->flash('flash_message', 'Your profile has been updated.');
		return view('vendors.edit', compact('vendor'));
	}
}
