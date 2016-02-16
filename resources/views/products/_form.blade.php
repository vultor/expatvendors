	<div class="form-group">
		{!! Form::label('title', 'Product Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('description', 'Description:') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) !!}
	</div>

	<div class="row" id="product_price">
        
        <div class="col-xs-3">
			<div class="form-group">
				{!! Form::label('currency', 'Currency') !!}
				{!! Form::text('currency', '₩', ['class' => 'form-control', 'disabled' => ' disabled']) !!}
			</div>
        </div><!--/.col-->
        
        <div class="col-xs-4">
			<!-- Price Form Input -->
			<div class="form-group">
				{!! Form::label('price', 'Price') !!}
				{!! Form::text('price', null, ['class' => 'form-control']) !!}
			</div>
        </div><!--/.col-->
        
        <div class="col-xs-5">
			<!-- Units Form Input -->
			<div class="form-group">
				{!! Form::label('unit', 'Units') !!}
				{!! Form::text('unit', null, ['class' => 'form-control']) !!}
			</div>
        </div><!--/.col-->

    </div><!--/.row-->

	<div class="form-group">
		{!! Form::label('priceunit', 'Price/Unit') !!}
		{!! Form::text('priceunit', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
	</div>

	<div class="form-group">
	    {!! Form::label('Product Image') !!}
	    {!! Form::file('image', null) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('status', 'Status:') !!}
		{!! Form::select('status', array('Taking Orders' => 'Taking Orders', 'Almost Sold Out' => 'Almost Sold Out', 'Sold Out for Now' => 'Sold Out for Now')) !!}
	</div>

	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary btn-lg']) !!}
