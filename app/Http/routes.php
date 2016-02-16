<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
   
    // Authentication 
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
		]);

	// Products CRUD resource. Check routes.
	Route::resource('products', 'ProductsController');

	// Homepage to browse stores.
	Route::get('/buy', 'StoresController@index')->name('buy');

	// Vendor profile edit.
	Route::get('/sell', ['middleware' => 'auth', 'as' => 'sell', function() {
		return view('sell');
	}]);

	// Buy/Sell switch page.
    Route::get('/', ['as' => 'buysell', function () {
    	return view('buysell');
	}]);

	// View cart contents.
	Route::get('/cart', 'CartController@index')->name('cart');

	// Add product to shopping cart.
	Route::match(['get', 'post'], '/cart/add/{id?}', 'CartController@add');

	// Update hopping cart.
	Route::post('/cart/update', 'CartController@update');

	// Order sucess.
	Route::post('/success', 'CartController@success')->name('success');

	// View cart contents.
	Route::get('/orders/vendor', 'OrderController@vendor')->name('vendor_orders');

	// View cart contents.
	Route::get('/orders/buyer', 'OrderController@buyer')->name('user_orders');

	// Customer users CRUD resource. Check routes.
	Route::resource('users', 'UsersController',
		['except' => ['index', 'create', 'store']]);

	// Vendor users CRUD resource. Check routes.
	Route::resource('vendors', 'VendorsController',
		['except' => ['index', 'create', 'store']]);
});
