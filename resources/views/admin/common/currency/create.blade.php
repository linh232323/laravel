@extends('admin.admin')
@section('content')
<div class="panel-body">
		{!!Form::open(array('route'=>'admin.currency.store','id'=>'form-attribute-group','class'=>'form-horizontal'))!!}
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-title">Title</label>
		    <div class="col-sm-10">
          		{!!Form::text("title",Input::old("title"),array("placeholder"=>"Title", "id"=>"input-title", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-code">Code</label>
		    <div class="col-sm-10">
          		{!!Form::text("code",Input::old("code"),array("placeholder"=>"Code", "id"=>"input-code", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-symbol_left">Symbol Left</label>
		    <div class="col-sm-10">
          		{!!Form::text("symbol_left",Input::old("symbol_left"),array("placeholder"=>"Symbol Left", "id"=>"input-symbol_left", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-symbol_right">Symbol Right</label>
		    <div class="col-sm-10">
          		{!!Form::text("symbol_right",Input::old("symbol_right"),array("placeholder"=>"Symbol Right", "id"=>"input-symbol_right", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-decimal_place">Decimal Place</label>
		    <div class="col-sm-10">
          		{!!Form::text("decimal_place",Input::old("decimal_place"),array("placeholder"=>"Decimal Place", "id"=>"input-decimal_place", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-value">Value</label>
		    <div class="col-sm-10">
          		{!!Form::text("value",Input::old("value"),array("placeholder"=>"Value", "id"=>"input-value", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	    <div class="form-group required">
	        <label class="col-sm-2 control-label" for="input-status">Status</label>
	        <div class="col-sm-10">
              	{!!Form::select('status', array('0' => 'Enabled', '1' => 'Disabled'),Input::old('status'),array( "id"=>"input-status", "class"=>"form-control"))!!}
	        </div>
	    </div>
	  	<div class="pull-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save </i></button>
        </div>
	  	{!!Form::close()!!}
</div>
@stop()