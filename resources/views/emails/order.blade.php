<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<a href="http://expatvendors.com"><img alt="Expat Vendors logo" src={!! asset('assets/img/ev-logo-circle-50.png') !!}> Expat Vendors</a>

<p>Hi {!! $buyer->name !!},</p>
<p>
    Your order has been placed! <a href="http://expatvendors.com/vendors/{!! $vendor->id !!}">{!! $vendor->vendor_name !!}</a> will get an email with the order details as described below. Expect an email from them within the next day or two with details on payment and delivery options.
</p>

<p>
    <hr>
</p>

<h3>Your Order Details</h3>

<table class="table table-bordered table-striped table-condensed">
    <thead>
        <tr>
            <th></th>
            <th></th>
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
                    <a href="http://expatvendors.com/products/{!! $product->id !!}">{{ $product->name }}</a><br>
                    {{ $product->options->product->priceunit }}<br>
                    Quantity: {!! $product->qty !!}<br>
                    Subtotal: {!! $product->options->product->currency !!} {!! number_format($product->subtotal, 0, '', ',') !!}
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    
<h3>Your Shipping Info</h3>

<address>{!! $buyer->name !!}<br>
    {!! $buyer->shipping_address !!}<br>
    {!! $buyer->city !!}<br>
    {!! $buyer->phone !!}<br>
    {!! $buyer->email !!}<br>
</address>

<p>
    <hr>
</p>

<p>Check all your past orders on the <a href="http://expatvendors.com/orders/buyer">Purchases</a> page.</p>

<p>
    If in 2 business days you haven't received an email from <a href="http://expatvendors.com/vendors/{!! $vendor->id !!}">{!! $vendor->vendor_name !!}</a>, then reply to this email and let me know.
</p>

<p>Thanks,</p>
<p>
    Shawn @ <a href="http://expatvendors.com/">ExpatVendors.com</a><br>
    shawn@expatvendors.com
</p>