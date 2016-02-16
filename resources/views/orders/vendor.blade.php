@extends('layouts.app')

@section('content')
	<h1>Your Sales</h1>
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>Who</th>
				<th>What</th>
				<th>Qty</th>
				<th>When</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
			<tr>
				<td>
					<a href="/users/{!! $order->buyer->id !!}">{!! $order->buyer->name !!}</a>
				</td>
				<td>
					<div>
						<a href="/products/{!! $order->product->id !!}">{!! $order->product->title !!}</a>
					</div>
				</td>
				<td>
					{!! $order->quantity !!}
				</td>
				<td>
					{!! $order->created_at->diffForHumans() !!}
				</td>
				<td>
					{!! $order->product->currency !!}{!! number_format($order->subtotal, 0, '', ',') !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@stop

@section('footer')
	@include('_footer_vendor')
@stop