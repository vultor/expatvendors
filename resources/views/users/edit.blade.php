@extends('layouts.app')

@section('content')

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h2 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#customerTab" aria-expanded="true" aria-controls="customerTab">
          Edit Customer Profile: {!! $user->name !!}
        </a>
      </h2>
    </div>
    <div id="customerTab" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        {!! Form::model($user, ['method' => 'PATCH', 'url' => 'users/' . $user->id]) !!}
        {!! csrf_field() !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone', 'Phone:') !!}
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('shipping_address', 'Shipping Address:') !!}
                {!! Form::text('shipping_address', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('city', 'City:') !!}
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::button('<i class="fa fa-btn fa-floppy-o"></i> Save Changes', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg']) !!}

        {!! Form::close() !!}

      </div><!--/.panel-body -->
    </div><!--/#collapseOne -->
  </div><!--/.panel-default -->
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h2 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#vendorTab" aria-expanded="false" aria-controls="vendorTab">
          Edit Vendor Profile: {!! $user->vendor_name !!}
        </a>
      </h2>
    </div>
    <div id="vendorTab" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">

        {!! Form::model($user, ['method' => 'PATCH', 'url' => 'users/' . $user->id]) !!}
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

      </div><!--/.panel-body -->
    </div><!--/#collapseOne -->
  </div><!--/.panel-default -->
</div><!--/#accordian -->

@stop

@section('footer')
    @include('_footer_user')
@stop
