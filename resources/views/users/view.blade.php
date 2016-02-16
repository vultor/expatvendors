@extends('layouts.app')

@section('content')
	<h1>{!! $user->name !!}</h1>
	<hr>
	<h3>{!! $user->vendor_name !!}</h3>
	<h2>in {!! $user->city !!}</h2>
@stop

@section('footer')
	@include('_footer_user')
@stop