@extends('layouts.app')

@section('content')
	{!! Breadcrumbs::render('vendors.show', $vendor->id) !!}
	<h2>{!! $vendor->vendor_name !!}</h2>
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>Product</th>
				<th>About</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
			<tr>
				<td width="30%">
					<a href="/products/{!! $product->id !!}"><img src={{asset('product/images/' . $product->image )}} alt="product image">
					<br>
					{{ $product->title }}</a>
				</td>
				<td>
					<div class="product_price">
						{{ $product->priceunit }}
					</div>
					<div class="panel-group" id="accordion">
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab">
					      <h4 class="panel-title">
					        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{!! $product->id !!}" aria-expanded="false">
					          Description
					        </a>
					      </h4>
					    </div>
					    <div id="collapse{!! $product->id !!}" class="panel-collapse collapse">
					      <div class="panel-body">
							{{ $product->description }}
					      </div>
					    </div>
					  </div>
					</div>

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
						<form method="POST" action="{{url('cart/add/' . $product->id )}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
								<div class="col-xs-4">
									<label>Quantity:</label>
								</div>
								<div class="col-xs-4">
									<select name="qty" class="col-xs-3 form-control">
										@for ($i = 1; $i<11; $i++)
								            <option value="{{ $i }}"
								            >{{ $i }}</option>
								        @endfor
									</select>
								</div>
							</div>
                            <button type="submit" class="btn btn-primary">
                                Add to Cart
                            </button>
                        </form>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop

@section('footer')
	@include('_footer_user')
@stop