@extends('layouts.app')

@section('content')
{!! Breadcrumbs::render('buy') !!}
<h1>Browse Stores</h1>

	@foreach ($vendors as $vendor)
	<div class="row center well">
		<div class="col-xs-12">
			<h2><a href="/vendors/{!! $vendor->id !!}">{{ $vendor->vendor_name }}</a></h2>
		</div>
		@foreach ($vendor->products as $product)
			<div class="product-row col-xs-4">
				<a href="/products/{!! $product->id !!}">
					<img src={{asset('product/images/' . $product->image )}} alt="product image">
					<h4 class="product-title">{!! $product->title!!}</h4>
				</a>
			</div>
		@endforeach
	</div>

	@endforeach

@stop

@section('footer')
 @include('_footer_user')
@stop