@extends('layouts.app')

@section('content')
{!! Breadcrumbs::render('products.show', $product) !!}
<h1>{{ $product->title }}</h1>
<div class="well">
	<img class="pull-right" src={{asset('product/images/' . $product->image )}} alt="product image">

	<h2>{{ $product->priceunit }}</h2>
	
	<p class="lead">
		{{ $product->description }}
	</p>
	@if ($product->status == 'Taking Orders')
		<div class="alert alert-important alert-success">
	@elseif ($product->status == 'Almost Sold Out')
		<div class="alert alert-important alert-warning">
	@else ($product->status == 'Sold Out for Now')
		<div class="alert alert-important alert-danger">
	@endif
			{{ $product->status }}<br>
		</div>

	@if ($product->status !== 'Sold Out for Now')
		<form method="POST" action="{{url('cart/add/' . $product->id)}}" class="form-inline quantity">
			<input type="hidden" name="product_rowid" value="{{ $product->rowid }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-xs-4">
					<label>Quantity:</label>
				</div>
				<div class="col-xs-4">
					<select name="qty" class="col-xs-3 form-control">
						@for ($i = 1; $i<11; $i++)
				            <option value="{{ $i }}"
				            @if ($i ==  $product->qty )
				             selected="selected"
				            @endif
				            >{{ $i }}</option>
				        @endfor
					</select>
				</div>
			</div>	
</div>

		<div class="center">
	        <button type="submit" class="btn btn-lg btn-success">
	            Add to Cart
	        </button>
		</div>

		</form>
	@endif
@stop

@section('footer')
	@include('_footer_user')
@stop