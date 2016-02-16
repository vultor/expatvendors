<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

	public function show($id)
	{
		$user = User::findOrFail($id);

		return view('users.view', compact('user'));
	}
    //
    public function edit($id)
	{
		$user = User::findOrFail($id);

		return view('users.edit', compact('user'));
	}

	public function update($id, Request $request)
	{
		$user = User::findOrFail($id);

		$user->update($request->all());

		session()->flash('flash_message', 'Your profile has been updated.');
		return view('users.edit', compact('user'));
	}
}
