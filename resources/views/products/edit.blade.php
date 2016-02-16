@extends('layouts.app')

@section('content')
	<h1>Edit: {!! $product->title !!}</h1>

	@include('errors.list')

	{!! Form::model($product, ['method' => 'PATCH', 'url' => 'products/' . $product->id, 'files' => true]) !!}

		@include('products._form', ['submitButtonText' => "Update Product"])

	{!! Form::close() !!}

@stop

@section('footer')
    @include('_footer_vendor')
@stop