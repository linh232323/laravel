@extends('admin.admin')
@section('content')
<div class="panel-body">
		{!!Form::model($data,array('route'=>array('admin.attributegroup.'.$route.'.update',$data->id),'method'=>'PUT','id'=>'form-attribute-group','class'=>'form-horizontal','files'=>true))!!}
		<div class="form-group required">
		    <label class="col-sm-2 control-label">Attribute Group Name</label>
		    <div class="col-sm-10">
		    	@foreach($languages as $language)
			        @if($data->descriptions()->where('languageID',$language->id)->first())
				    	@if(Input::old())
				    	<div class="input-group"><span class="input-group-addon"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"></span>
				        	<input type="text" name="attribute_group_description_{{$language->id}}" value="{{Input::old('attribute_group_description_1')}}" placeholder="Attribute Group Name" class="form-control">
				      	</div>
				      	@else
				    	<div class="input-group"><span class="input-group-addon"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"></span>
				        	<input type="text" name="attribute_group_description_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->name}}" placeholder="Attribute Group Name" class="form-control">
				      	</div>
				      	@endif
			      	@else
				    	<div class="input-group"><span class="input-group-addon"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"></span>
				        	<input type="text" name="attribute_group_description_{{$language->id}}" value="{{Input::old('attribute_group_description_'.$language->id)}}" placeholder="Attribute Group Name" class="form-control">
				      	</div>
			      	@endif
		      	@endforeach
		  	</div>
	  	</div>
	  	<div class="form-group">
		    <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
		    <div class="col-sm-10">
		    	@if(Input::old())
		      	<input type="number" name="sort_order" value="{{Input::old('sort_order')}}" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
		      	@else
		      	<input type="number" name="sort_order" value="{{$data->sort_order}}" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
		      	@endif
		    </div>
	  	</div>
	  	<div class="pull-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save </i></button>
        </div>
	  	{!!Form::close()!!}
</div>
@stop()