@extends('admin.admin')
@section('content')
<div class="panel-body">
          {!!Form::open(array('route'=>'admin.category.store','id'=>'form-category','files'=>true,'class'=>'form-horizontal'))!!}
          <div class="pull-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save </i></button>
          </div>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
            @foreach($languages as $language)
            <li><a href="#tab-{{$language->code}}" data-toggle="tab"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"> {{$language->name}} </a></li>
            @endforeach 
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="tab-general">
              <br/>
              <div class="tab-content">
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-parent">Parent</label>
                    <div class="col-sm-10">
                      {!!Form::select('parent_id', $categories ,Input::old('parent_id'),array( "id"=>"input-parent-id", "class"=>"form-control"))!!}
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="http://localhost/opencart/image/cache/no_image-100x100.png" alt="" title="" data-placeholder="http://localhost/opencart/image/cache/no_image-100x100.png"></a>
                      <input type="hidden" name="image" value="" id="input-image">
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-column"><span data-toggle="tooltip" title="" data-original-title="Number of columns to use for the bottom 3 categories. Only works for the top parent categories.">Columns</span></label>
                    <div class="col-sm-10">
                      {!!Form::select('column', array('0' => '--None--', '1' => 'Column Left', '2' => 'Column Right'),Input::old('column'),array( "id"=>"input-column", "class"=>"form-control"))!!}
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                    <div class="col-sm-10">
                      @if(Input::old())
                      <input type="number" name="sort_order" value="{{Input::old('sort_order')}}" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
                      @else
                      <input type="number" name="sort_order" value="1" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
                      @endif
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-status">Status</label>
                    <div class="col-sm-10">
                      {!!Form::select('status', array('0' => 'Enabled', '1' => 'Disabled'),Input::old('status'),array( "id"=>"input-status", "class"=>"form-control"))!!}
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-top"><span data-toggle="tooltip" title="" data-original-title="Display in the top menu bar. Only works for the top parent categories.">Menu</span></label>
                    <div class="col-sm-10">
                      {!!Form::select('menu', array('0' => 'Enabled', '1' => 'Disabled'),Input::old('menu'),array( "id"=>"input-status", "class"=>"form-control"))!!}
                    </div>
                  </div>
              </div>
            </div>
            @foreach($languages as $language)
            <div class="tab-pane fade" id="tab-{{$language->code}}">
              <br/>
              <div class="tab-content">
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-name2">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="category_name_{{$language->id}}" value="{{Input::old('category_name_'.$language->id)}}" placeholder="Category Name" id="input-name2" class="form-control">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-meta-title{{$language->id}}">Meta Tag Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="category_meta_title_{{$language->id}}" value="{{Input::old('category_meta_title_'.$language->id)}}" placeholder="Meta Tag Title" id="input-meta-title{{$language->id}}" class="form-control">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-meta-description{{$language->id}}">Meta Tag Description</label>
                  <div class="col-sm-10">
                      <textarea name="category_meta_description_{{$language->id}}" rows="5" placeholder="Meta Tag Description" id="input-meta-description{{$language->id}}" class="form-control">{{Input::old('category_meta_description_'.$language->id)}}</textarea>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-meta-keyword{{$language->id}}">Meta Tag Keywords</label>
                  <div class="col-sm-10">
                      <textarea name="category_meta_keyword_{{$language->id}}" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword{{$language->id}}" class="form-control">{{Input::old('category_meta_keyword_'.$language->id)}}</textarea>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          {!!Form::close()!!}
      </div>
@stop