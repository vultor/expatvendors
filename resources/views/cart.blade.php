@extends('layouts.app')

@section('content')
{!! Breadcrumbs::render('cart', $vendor->id) !!}
	<h2>Your Shopping Cart at <a href="/vendors/{!! $vendor->id !!}">{!! $vendor->vendor_name !!}</a></h2>
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th></th>
				<th>Product</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
			<tr>
				<td width="30%">
					<img src={{asset('product/images/' . $product->options->product->image )}} alt="product image">
				</td>
				<td>
					<div>
						{{ $product->name }}<br>
						{{ $product->options->product->priceunit }}<br>
						<form method="POST" action="{{url('cart/update')}}" class="form-inline quantity">
							<input type="hidden" name="product_id" value="{{ $product->id }}">
							<input type="hidden" name="product_rowid" value="{{ $product->rowid }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-xs-4">
									<label>Quantity:</label>
								</div>
								<div class="col-xs-4">
									<select class="qty" name="qty" class="col-xs-3 form-control">
										@for ($i = 0; $i<11; $i++)
								            <option value="{{ $i }}"
								            @if ($i ==  $product->qty )
								             selected="selected"
								            @endif
								            >{{ $i }}</option>
								        @endfor
									</select>
								</div>
							</div>
						</form>
						Subtotal: {!! $product->options->product->currency !!}{!! number_format($product->subtotal, 0, '', ',') !!}
					</div>
				</td>
			</tr>
			@endforeach
			<tr>
				<td>
				</td>
				<td>
					<div class="total-price"><strong>Total Cost:</strong> {!! $product->options->product->currency !!}{!! number_format(Cart::total(), 0, '', ',') !!}</div>
				</td>
			</tr>
		</tbody>
	</table>

	<div id="shipping-details">
		
		<h3>Shipping Details</h3>
		
		<address>{!! Auth::user()->name !!}<br>
			{!! Auth::user()->shipping_address !!}<br>
			{!! Auth::user()->city !!}<br>
			{!! Auth::user()->phone !!}<br>
			{!! Auth::user()->email !!}<br>
		</address>

	</div>

	<div class="alert alert-info alert-important">
		 <strong>*Important*</strong> Clicking "Place Order" will send an order email to the vendor, {!! $vendor->vendor_name !!}, who will contact you to arrange payment and delivery.
    </div>
	<div id="order-form" class="center">
		{!! Form::open(['route' => ['success']]) !!}
		{!! Form::hidden('user_id', Auth::user()->id ) !!}
		{!! Form::hidden('vendor_id', $vendor->id ) !!}
		{!! Form::hidden('products', $products ) !!}
		{!! Form::hidden('total_cost', number_format(Cart::total(), 0, '', ',') ) !!}
		{!! Form::submit('Place Order, Yo', array('class' => 'btn btn-lg btn-success')) !!}
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('_footer_user')
@stop