@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Sell Stuff</h1>
            
            <hr>

            <a href="/vendors/{!! Auth::user()->id !!}/edit" class="btn btn-lg btn-block btn-primary"><h2><i class="fa fa-building-o"></i> Set Vendor Profile</h2></a>
            <p>
                Choose a business name, email, phone, and address for your vendor profile. Only your business name, and email are required.
            </p>
            
            <hr>

            <a href="/products" class="btn btn-lg btn-block btn-primary"><h2><i class="fa fa-plus"></i> Add Products</h2></a>
            <p>
                Add up to 3 products or services you repeatedly offer - not one-time second-hand items.
            </p>

        </div>
    </div>
</div>
@stop

@section('footer')
    @include('_footer_vendor')
@stop

