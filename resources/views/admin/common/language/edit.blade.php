@extends('admin.admin')
@section('content')
<div class="panel-body">
		{!!Form::model($data,array('route'=>array("admin.language.update",$data->id),'method'=>'PUT','id'=>'form-attribute-group','class'=>'form-horizontal','files'=>true))!!} 
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-name">Language Name</label>
		    <div class="col-sm-10">
          		{!!Form::text("name",Input::old("name"),array("placeholder"=>"Language Name", "id"=>"input-name", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-code">Code</label>
		    <div class="col-sm-10">
          		{!!Form::text("code",Input::old("code"),array("placeholder"=>"Code", "id"=>"input-code", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-locale">Locale</label>
		    <div class="col-sm-10">
          		{!!Form::text("locale",Input::old("locale"),array("placeholder"=>"Locale", "id"=>"input-locale", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-image">Image</label>
		    <div class="col-sm-10">
          		{!!Form::text("image",Input::old("image"),array("placeholder"=>"Image", "id"=>"input-image", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-directory">Directory</label>
		    <div class="col-sm-10">
          		{!!Form::text("directory",Input::old("directory"),array("placeholder"=>"Directory", "id"=>"input-directory", "class"=>"form-control"))!!}
		    </div>
	  	</div>
	  	<div class="form-group required">
		    <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
		    <div class="col-sm-10">
	            @if(Input::old())
	            <input type="number" name="sort_order" value="{{Input::old('sort_order')}}" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
	            @else
	            <input type="number" name="sort_order" value="$data->sort_order" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
	            @endif
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