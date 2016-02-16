@extends('layouts.app')

@section('content')
{!! Breadcrumbs::render('cart', $vendor->id) !!}
    <h1>Your Order</h1>

    <div class="alert alert-warning alert-important">
        <p><h2>Success!</h2> An order email has been sent to {!! $vendor->vendor_name !!}, who will email you to arrange payment and delivery.</p>
    </div>

    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th></th>
                <th>Order</th>
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
                        <a href="/products/{!! $product->id !!}">{{ $product->name }}</a><br>
                        {{ $product->options->product->priceunit }}<br>
                        <form method="POST" action="{{url('cart/update')}}" class="form-inline quantity">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label>Quantity:</label>
                                </div>
                                <div class="col-xs-4">
                                    {!! $product->qty !!}
                                </div>
                            </div>
                        </form>
                        Subtotal: {!! $product->options->product->currency !!}{!! number_format($product->subtotal, 0, '', ',') !!}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    Check out more from <a href="/vendors/{!! $vendor->id !!}">{!! $vendor->vendor_name !!}</a>

    <div id="shipping-details">
        
        <h3>Shipping Details</h3>
        
        <address>{!! $buyer->name !!}<br>
            {!! $buyer->shipping_address !!}<br>
            {!! $buyer->city !!}<br>
            {!! $buyer->phone !!}<br>
            {!! $buyer->email !!}<br>
        </address>
        <p>Update your <a href="/users/{!! Auth::user()->id !!}/edit">Profile</a>, including your shipping address.</p>

    </div>

@stop

@section('footer')
    @include('_footer_user')
@stop