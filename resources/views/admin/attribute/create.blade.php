@extends('admin.admin')
@section('content')
<div class="panel-body">
		{!!Form::open(array('route'=>'admin.attribute.'.$route.'.store','id'=>'form-attribute-group','class'=>'form-horizontal','files'=>true))!!}
		<div class="form-group required">
		    <label class="col-sm-2 control-label">Attribute Name</label>
		    <div class="col-sm-10">
		    	@foreach($languages as $language)
		    	<div class="input-group"><span class="input-group-addon"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"></span>
              		{!!Form::text("attribute_description_$language->id",Input::old("attribute_description_$language->id"),array("placeholder"=>"Attribute Name", "id"=>"input-attribute-group", "class"=>"form-control"))!!}
		      	</div>
		      	@endforeach
		  	</div>
	  	</div>
	  	<div class="form-group">
        	<label class="col-sm-2 control-label" for="input-attribute-group">Attribute Group</label>
        	<div class="col-sm-10">
              {!!Form::select('attribute_group_id', $groups ,Input::old('attribute_group_id'),array( "id"=>"input-attribute-group", "class"=>"form-control"))!!}
            </div>
         </div>
	  	<div class="form-group">
		    <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
		    <div class="col-sm-10">
		    	@if(Input::old())
		      	<input type="number" name="sort_order" value="{{Input::old('sort_order')}}" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
		      	@else
		      	<input type="number" name="sort_order" value="1" placeholder="Sort Order" min="0" id="input-sort-order" class="form-control">
		      	@endif
		    </div>
	  	</div>
	  	<div class="pull-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save </i></button>
        </div>
	  	{!!Form::close()!!}
</div>
@stop()
@section('script')
@stop