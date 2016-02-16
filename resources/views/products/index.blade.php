@extends('layouts.app')

@section('content')
<h1>Products</h1>
<ol class="well">
	@foreach ($products as $product)
		<li>
			<h2>{{ $product->title }}</h2>
			<img class="pull-right" src={{asset('product/images/' . $product->image )}} alt="product image">
			<p class="lead">
				{{ $product->priceunit }}
			</p>

			<p>
				{{ $product->description }}
			</p>
			<a href="/products/{{ $product->id }}/edit" class="btn btn-danger">Edit Product</a>
		</li>
		<hr>
	@endforeach
</ol>

<div class="center">
	<a href="/products/create" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Add Product</a>
</div>

@stop

@section('footer')
	@include('_footer_vendor')
@stop