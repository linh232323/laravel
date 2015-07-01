@extends('admin.admin')
@section('content')
<div class="panel-body">
          {!!Form::open(array('route'=>array('admin.category.update',$data->id),'method'=>'PUT','id'=>'form-category','files'=>true,'class'=>'form-horizontal'))!!}
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
                      <select name="parent_id" id="input-user-group" class="form-control">
                        <option value="0">--None--</option>
                        @foreach($parent as $id=>$name)
                          @if($data->id==$id)
                          @else
                            @if(Input::old('parent_id')==$id && Input::old('parent_id')!="")
                            <option value="{{$id}}" selected="selected">{{$name}}</option>
                            @elseif($data->parent_id==$id)
                            <option value="{{$id}}" selected="selected">{{$name}}</option>
                            @else
                            <option value="{{$id}}">{{$name}}</option>
                            @endif
                          @endif
                        @endforeach
                      </select>
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
                      <select name="column" id="input-user-group" class="form-control">
                        @if((Input::old('parent_id')==1 && Input::old('parent_id')!="") || $data->column==1)
                        <option value="0">--None--</option>
                        <option value="1" selected="selected">Column Left</option>
                        <option value="2">Column Right</option>
                        @elseif((Input::old('parent_id')==2 && Input::old('parent_id')!="") || $data->column==2)
                        <option value="0">--None--</option>
                        <option value="1">Column Left</option>
                        <option value="2" selected="selected">Column Right</option>
                        @else
                        <option value="0">--None--</option>
                        <option value="1">Column Left</option>
                        <option value="2">Column Right</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                    <div class="col-sm-10">
                      @if(Input::old())
                      <input type="number" name="sort_order" value="{{Input::old('sort_order')}}" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
                      @else
                      <input type="number" name="sort_order" value="0" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
                      @endif
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-status">Status</label>
                    <div class="col-sm-10">
                      <select name="status" id="input-status" class="form-control">
                          @if(Input::old('status')==0 || $data->status==0)
                          <option value="0" selected="selected">Enabled</option>
                          <option value="1">Disabled</option>
                          @else
                          <option value="0">Enabled</option>
                          <option value="1" selected="selected">Disabled</option>
                          @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-top"><span data-toggle="tooltip" title="" data-original-title="Display in the top menu bar. Only works for the top parent categories.">Menu</span></label>
                    <div class="col-sm-10">
                      <select name="menu" id="input-status" class="form-control">
                          @if(Input::old('menu')==0|| $data->menu==0)
                          <option value="0" selected="selected">Enabled</option>
                          <option value="1">Disabled</option>
                          @else
                          <option value="0">Enabled</option>
                          <option value="1" selected="selected">Disabled</option>
                          @endif
                      </select>
                    </div>
                  </div>
              </div>
            </div>
            @foreach($languages as $language)
            @if($data->descriptions()->where('languageID',$language->id)->first())
            <div class="tab-pane fade" id="tab-{{$language->code}}">
              <br/>
              <div class="tab-content">
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-name2">Category Name</label>
                  <div class="col-sm-10">
                    @if(Input::old())
                    <input type="text" name="category_name_{{$language->id}}" value="{{Input::old('category_name_'.$language->id)}}" placeholder="Category Name" id="input-name2" class="form-control">
                    @else
                    <input type="text" name="category_name_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->name}}" placeholder="Category Name" id="input-name2" class="form-control">
                    @endif
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-meta-title{{$language->id}}">Meta Tag Title</label>
                  <div class="col-sm-10">
                    @if(Input::old())
                    <input type="text" name="category_meta_title_{{$language->id}}" value="{{Input::old('category_meta_title_'.$language->id)}}" placeholder="Meta Tag Title" id="input-meta-title{{$language->id}}" class="form-control">
                    @else
                    <input type="text" name="category_meta_title_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->meta_title}}" placeholder="Meta Tag Title" id="input-meta-title{{$language->id}}" class="form-control">
                    @endif
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-meta-description{{$language->id}}">Meta Tag Description</label>
                  <div class="col-sm-10">
                      @if(Input::old())
                      <textarea name="category_meta_description_{{$language->id}}" rows="5" placeholder="Meta Tag Description" id="input-meta-description{{$language->id}}" class="form-control">{{Input::old('category_meta_description_'.$language->id)}}</textarea>
                      @else
                      <textarea name="category_meta_description_{{$language->id}}" rows="5" placeholder="Meta Tag Description" id="input-meta-description{{$language->id}}" class="form-control">{{$data->descriptions()->where('languageID',$language->id)->first()->meta_description}}</textarea>
                      @endif
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-meta-keyword{{$language->id}}">Meta Tag Keywords</label>
                  <div class="col-sm-10">
                      @if(Input::old())
                      <textarea name="category_meta_keyword_{{$language->id}}" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword{{$language->id}}" class="form-control">{{Input::old('category_meta_keyword_'.$language->id)}}</textarea>
                      @else
                      <textarea name="category_meta_keyword_{{$language->id}}" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword1" class="form-control">{{$data->descriptions()->where('languageID',$language->id)->first()->meta_keyword}}</textarea>
                      @endif
                  </div>
                </div>
              </div>
            </div>
            @else
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
            @endif
            @endforeach
          </div>
          {!!Form::close()!!}
      </div>
@stop