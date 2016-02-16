@extends('layouts.app')

@section('content')
	<h1>Add Product</h1>

	@include('errors.list')

	{!! Form::open(['url' => 'products', 'files' => true]) !!}

		@include('products._form', ['submitButtonText' => "Add Product"])

	{!! Form::close() !!}

@stop

@section('footer')
	@include('_footer_vendor')
@stop