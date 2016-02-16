<?php

// Home
Breadcrumbs::register('buysell', function($breadcrumbs)
{
    $breadcrumbs->push('Buy/Sell', route('buysell'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('buysell');
    $breadcrumbs->push('About', route('about'));
});

// Home > Buy
Breadcrumbs::register('buy', function($breadcrumbs)
{
    $breadcrumbs->parent('buysell');
    $breadcrumbs->push('Buy', route('buy'));
});

// Home > Buy > [Vendor]
Breadcrumbs::register('vendors.show', function($breadcrumbs, $vendor_id)
{
	$vendor = DB::table('users')
				->where('id', '=', $vendor_id)
				->first();

    $breadcrumbs->parent('buy');
    $breadcrumbs->push($vendor->vendor_name, route('vendors.show', $vendor->id));
});

// Home > Buy > [Vendor] > [Product]
Breadcrumbs::register('products.show', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('vendors.show', $product->user_id);
    $breadcrumbs->push($product->title, route('products.show', $product->id));
});

// Home > Buy > [Vendor] > Cart
Breadcrumbs::register('cart', function($breadcrumbs, $vendor)
{
    $breadcrumbs->parent('vendors.show', $vendor);
    $breadcrumbs->push('Cart', route('cart'));
});