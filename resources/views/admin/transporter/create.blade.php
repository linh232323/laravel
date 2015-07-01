@extends('admin.admin')
@section('content')
<div class="panel-body">
		{!!Form::open(array('route'=>'admin.transporter.store','id'=>'form-transporter','class'=>'form-horizontal','files'=>true))!!}
		<div class="form-group required">
		    <label class="col-sm-2 control-label">Transporter Name</label>
		    <div class="col-sm-10">
		    	@foreach($languages as $language)
		    	<div class="input-group"><span class="input-group-addon"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"></span>
		        	<input type="text" name="transporter_{{$language->id}}" value="{{Input::old('transporter_'.$language->id)}}" placeholder="Transporter Name" class="form-control">
		      	</div>
		      	@endforeach
		  	</div>
	  	</div>
	    <div class="form-group required">
	        <label class="col-sm-2 control-label" for="input-image">Image</label>
	        <div class="col-sm-10">
				@if(Input::old('image'))
				<a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/'.Input::old('image'))}}" alt="" title="" data-placeholder="{{URL::asset('public/admin/image/logo.png')}}"></a>
				@else
				<a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/admin/image/logo.png')}}" alt="" title="" data-placeholder="{{URL::asset('public/admin/image/logo.png')}}"></a>
				@endif
				<input type="hidden" name="image" value="{{Input::old('image')}}" id="input-image">
	        </div>
	    </div>
	  	<div class="form-group">
		    <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
		    <div class="col-sm-10">
		    	@if(Input::old())
		      	<input type="number" name="sort_order" value="{{Input::old('sort_order')}}" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
		      	@else
		      	<input type="number" name="sort_order" value="1" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
		      	@endif
		    </div>
	  	</div>
	  	<div class="pull-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save </i></button>
        </div>
	  	{!!Form::close()!!}
</div>
@stop()