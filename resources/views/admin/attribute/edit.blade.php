@extends('admin.admin')
@section('content')
<div class="panel-body">
		{!!Form::open(array('route'=>array('admin.attribute.'.$route.'.update',$data->id),'method'=>'PUT','id'=>'form-attribute-group','class'=>'form-horizontal','files'=>true))!!}
		<div class="form-group required">
		    <label class="col-sm-2 control-label">Attribute Name</label>
		    <div class="col-sm-10">
		    	@foreach($languages as $language)
			        @if($data->descriptions()->where('languageID',$language->id)->first())
				    	@if(Input::old())
				    	<div class="input-group"><span class="input-group-addon"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"></span>
				        	<input type="text" name="attribute_description_{{$language->id}}" value="{{Input::old('attribute_description_1')}}" placeholder="Attribute Group Name" class="form-control">
				      	</div>
				      	@else
				    	<div class="input-group"><span class="input-group-addon"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"></span>
				        	<input type="text" name="attribute_description_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->name}}" placeholder="Attribute Group Name" class="form-control">
				      	</div>
				      	@endif
			      	@else
				    	<div class="input-group"><span class="input-group-addon"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"></span>
		              		{!!Form::text("attribute_description_$language->id",Input::old("attribute_description_$language->id"),array("placeholder"=>"Attribute Name", "id"=>"input-attribute-group", "class"=>"form-control"))!!}
				      	</div>
			      	@endif
		      	@endforeach
		  	</div>
	  	</div>
	  	<div class="form-group">
        	<label class="col-sm-2 control-label" for="input-attribute-group">Attribute Group</label>
        	<div class="col-sm-10">
              <select name="attribute_group_id" id="input-attribute-group" class="form-control">
              	@foreach($groups as $id => $name)
              	@if(Input::old('attribute_group')==$id && Input::old('attribute_group')!="")
              		<option value="{{$id}}" selected="selected">{{$name}}</option>
              	@elseif($data->attributegroupID==$id)
              		<option value="{{$id}}" selected="selected">{{$name}}</option>
              	@else
              		<option value="{{$id}}">{{$name}}</option>
              	@endif
              	@endforeach
              </select>
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