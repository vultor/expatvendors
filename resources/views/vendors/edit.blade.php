@extends('layouts.app')

@section('content')

    <h1>Edit Vendor Profile:<br> {!! $vendor->vendor_name !!}</h1>

    {!! Form::model($vendor, ['method' => 'PATCH', 'url' => 'vendors/' . $vendor->id]) !!}
    {!! csrf_field() !!}

        <div class="form-group">
            {!! Form::label('vendor_name', 'Business Name:') !!}
            {!! Form::text('vendor_name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vendor_email', 'Business Email:') !!}
            {!! Form::text('vendor_email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vendor_phone', 'Business Phone:') !!}
            {!! Form::text('vendor_phone', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vendor_address', 'Business Address:') !!}
            {!! Form::text('vendor_address', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::button('<i class="fa fa-btn fa-floppy-o"></i> Save Changes', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg']) !!}

    {!! Form::close() !!}

@stop

@section('footer')
    @include('_footer_vendor')
@stop
