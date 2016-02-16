@extends('layouts.app')

@section('content')
	<h1>Your Purchases</h1>
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>What</th>
				<th>Qty</th>
				<th>Cost</th>
				<th>When</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
			<tr>
				<td>
					<div>
						<a href="/products/{!! $order->product->id !!}">{!! $order->product->title !!}</a>
					</div>
				</td>
				<td>
					{!! $order->quantity !!}
				</td>
				<td>
					{!! $order->product->currency !!}{!! number_format($order->subtotal, 0, '', ',') !!}
				</td>
				<td>
					{!! $order->created_at->diffForHumans() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@stop

@section('footer')
	@include('_footer_user')
@stop