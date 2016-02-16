@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          
            <img class="center img-responsive" src="assets/img/ev-logo-lg.jpg" alt="Expat Vendors logo">
            
            <a href="/buy" class="btn btn-lg btn-block btn-primary"><h2>Buy Stuff</h2></a>
            
            <a href="/sell" class="btn btn-lg btn-block btn-info"><h2>Sell Stuff</h2></a>

        </div>
    </div>
</div>
@stop

@section('footer')
<nav class="navbar navbar-fixed-bottom">
  <div class="container">
    <div class="row">
        <div class="col-xs-2">
        </div>
        <div class="col-xs-10">
            <a href="https://dribbble.com/creativeflip"><img class="pull-right" src="assets/img/obiwan-icon-60.png" alt="Obiwan Kenobi icon"></a>
            <p>These are NOT the secondhand stores you're looking for.</p>
        </div>
    </div>
  </div>
</nav>
@stop

