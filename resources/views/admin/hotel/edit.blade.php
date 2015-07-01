@extends('admin.admin')
@section('content')
<div class="panel-body">
          {!!Form::model($data,array('route'=>array('admin.hotel.update',$data->id),'method'=>'PUT','id'=>'form-category','files'=>true,'class'=>'form-horizontal'))!!}
          <div class="pull-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save </i></button>
          </div>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab"> General </a></li>
            <li><a href="#tab-data" data-toggle="tab"> Data </a></li>
            <li><a href="#tab-attribute" data-toggle="tab"> Attribute </a></li>
            <li><a href="#tab-map" data-toggle="tab"> Map </a></li>
            <li><a href="#tab-images" data-toggle="tab"> Images </a></li>
            <li><a href="#tab-rooms" data-toggle="tab" class="tab-rooms"> Rooms </a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="tab-general">
				<div class="content">
	        	<ul class="nav nav-tabs" id="language"> 
		            @foreach($languages as $language)
		            <li><a href="#tab-{{$language->code}}" data-toggle="tab"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"> {{$language->name}} </a></li>
		            @endforeach 
	            </ul>
         	 	<div class="tab-content">
		            @foreach($languages as $language)
			        @if($data->descriptions()->where('languageID',$language->id)->first())
		            <div class="tab-pane fade" id="tab-{{$language->code}}">
						<div class="content">
							<div class="form-group required">
							    <label class="col-sm-2 control-label" for="input-name{{$language->id}}">Hotel Name</label>
							    <div class="col-sm-10">
							    	@if(Input::old())
							        <input type="text" name="name_{{$language->id}}" value="{{Input::old('name_'.$language->id)}}" placeholder="Hotel Name" id="input-name{{$language->id}}" class="form-control">
							        @else
							        <input type="text" name="name_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->name}}" placeholder="Hotel Name" id="input-name{{$language->id}}" class="form-control">
							        @endif
							    </div>
							</div>
							<div class="form-group required">
						        <label class="col-sm-2 control-label" for="input-address{{$language->id}}">Address</label>
						        <div class="col-sm-10">
						        	@if(Input::old())
						            <input type="text" name="address_{{$language->id}}" placeholder="Address" id="input-address{{$language->id}}" value="{{Input::old('address_'.$language->id)}}" class="form-control">
						            @else
						            <input type="text" name="address_{{$language->id}}" placeholder="Address" id="input-address{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->address}}" class="form-control">
						            @endif
						        </div>
						    </div>
						    <div class="form-group required">
						    	<label class="col-sm-2 control-label" for="input-description_{{$language->id}}">Description</label>
						    	<div class="col-sm-10">
						    		@if(Input::old())
						    		<textarea name="description_{{$language->id}}" placeholder="Description" id="input-description_{{$language->id}}">{{Input::old('description_'.$language->id)}}</textarea>
						    		@else
						    		<textarea name="description_{{$language->id}}" placeholder="Description" id="input-description_{{$language->id}}">{{$data->descriptions()->where('languageID',$language->id)->first()->description}}</textarea>
						    		@endif
						    	</div>
						    </div>
						    <div class="form-group required">
						    	<label class="col-sm-2 control-label" for="input-short_description_{{$language->id}}">Short Description</label>
						    	<div class="col-sm-10">
						    		@if(Input::old())
						    		<textarea name="short_description_{{$language->id}}" placeholder="Description" id="input-short_description_{{$language->id}}" >{{Input::old('short_description_'.$language->id)}}</textarea>
						    		@else
						    		<textarea name="short_description_{{$language->id}}" placeholder="Description" id="input-short_description_{{$language->id}}" >{{$data->descriptions()->where('languageID',$language->id)->first()->short_description}}</textarea>
						    		@endif
						    	</div>
						    </div>
						    <div class="form-group required">
							    <label class="col-sm-2 control-label" for="input-meta-title{{$language->id}}">Meta Tag Title</label>
							    <div class="col-sm-10">
							    	@if(Input::old())
							        <input type="text" name="meta_title_{{$language->id}}" value="{{Input::old('meta_title_'.$language->id)}}" placeholder="Meta Tag Title" id="input-meta-title{{$language->id}}" class="form-control">
							        @else
							        <input type="text" name="meta_title_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->meta_title}}" placeholder="Meta Tag Title" id="input-meta-title{{$language->id}}" class="form-control">
							        @endif
							    </div>
							</div>
							<div class="form-group required">
							    <label class="col-sm-2 control-label" for="input-meta-description{{$language->id}}">Meta Tag Description</label>
							    <div class="col-sm-10">
							    	@if(Input::old())
							        <textarea name="meta_description_{{$language->id}}" rows="5" placeholder="Meta Tag Description" id="input-meta-description{{$language->id}}" class="form-control">{{Input::old('meta_description_'.$language->id)}}</textarea>
							        @else
							        <textarea name="meta_description_{{$language->id}}" rows="5" placeholder="Meta Tag Description" id="input-meta-description{{$language->id}}" class="form-control">{{$data->descriptions()->where('languageID',$language->id)->first()->meta_description}}</textarea>
							        @endif
							    </div>
							</div>
							<div class="form-group required">
						        <label class="col-sm-2 control-label" for="input-meta-keyword{{$language->id}}">Meta Tag Keywords</label>
						        <div class="col-sm-10">
						        	@if(Input::old())
						            <textarea name="meta_keyword_{{$language->id}}" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword{{$language->id}}" class="form-control">{{Input::old('meta_keyword_'.$language->id)}}</textarea>
						            @else
						            <textarea name="meta_keyword_{{$language->id}}" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword{{$language->id}}" class="form-control">{{$data->descriptions()->where('languageID',$language->id)->first()->meta_keyword}}</textarea>
						            @endif
						        </div>
						    </div>
						    <div class="form-group required">
						        <label class="col-sm-2 control-label" for="input-tag{{$language->id}}"><span data-toggle="tooltip" title="" data-original-title="comma separated">Hotel Tags</span></label>
						        <div class="col-sm-10">
						        	@if(Input::old())
						            <input type="text" name="tag_{{$language->id}}" value="{{Input::old('tag_'.$language->id)}}" placeholder="Hotel Tags" id="input-tag{{$language->id}}" class="form-control">
						            @else
						            <input type="text" name="tag_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->tag}}" placeholder="Hotel Tags" id="input-tag{{$language->id}}" class="form-control">
						            @endif
						        </div>
						    </div>
						</div>
		            </div>
					@else
		            <div class="tab-pane fade" id="tab-{{$language->code}}">
						<div class="content">						
							<div class="form-group required">
							    <label class="col-sm-2 control-label" for="input-name{{$language->id}}">Hotel Name</label>
							    <div class="col-sm-10">
							        <input type="text" name="name_{{$language->id}}" value="{{Input::old('name_'.$language->id)}}" placeholder="Hotel Name" id="input-name{{$language->id}}" class="form-control">
							    </div>
							</div>
							<div class="form-group required">
						        <label class="col-sm-2 control-label" for="input-address{{$language->id}}">Address</label>
						        <div class="col-sm-10">
						            <input type="text" name="address_{{$language->id}}" placeholder="Address" id="input-address{{$language->id}}" value="{{Input::old('address_'.$language->id)}}" class="form-control">
						        </div>
						    </div>
						    <div class="form-group required">
						    	<label class="col-sm-2 control-label" for="input-description_{{$language->id}}">Description</label>
						    	<div class="col-sm-10">
						    		<textarea name="description_{{$language->id}}" placeholder="Description" id="input-description_{{$language->id}}">{{Input::old('description_'.$language->id)}}</textarea>
						    	</div>
						    </div>
						    <div class="form-group required">
						    	<label class="col-sm-2 control-label" for="input-short_description_{{$language->id}}">Short Description</label>
						    	<div class="col-sm-10">
						    		<textarea name="short_description_{{$language->id}}" placeholder="Description" id="input-short_description_{{$language->id}}" >{{Input::old('short_description_'.$language->id)}}</textarea>
						    	</div>
						    </div>
						    <div class="form-group required">
							    <label class="col-sm-2 control-label" for="input-meta-title{{$language->id}}">Meta Tag Title</label>
							    <div class="col-sm-10">
							        <input type="text" name="meta_title_{{$language->id}}" value="{{Input::old('meta_title_'.$language->id)}}" placeholder="Meta Tag Title" id="input-meta-title{{$language->id}}" class="form-control">
							    </div>
							</div>
							<div class="form-group required">
							    <label class="col-sm-2 control-label" for="input-meta-description{{$language->id}}">Meta Tag Description</label>
							    <div class="col-sm-10">
							        <textarea name="meta_description_{{$language->id}}" rows="5" placeholder="Meta Tag Description" id="input-meta-description{{$language->id}}" class="form-control">{{Input::old('meta_description_'.$language->id)}}</textarea>
							    </div>
							</div>
							<div class="form-group required">
						        <label class="col-sm-2 control-label" for="input-meta-keyword{{$language->id}}">Meta Tag Keywords</label>
						        <div class="col-sm-10">
						            <textarea name="meta_keyword_{{$language->id}}" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword{{$language->id}}" class="form-control">{{Input::old('meta_keyword_'.$language->id)}}</textarea>
						        </div>
						    </div>
						    <div class="form-group required">
						        <label class="col-sm-2 control-label" for="input-tag{{$language->id}}"><span data-toggle="tooltip" title="" data-original-title="comma separated">Hotel Tags</span></label>
						        <div class="col-sm-10">
						            <input type="text" name="tag_{{$language->id}}" value="{{Input::old('tag_'.$language->id)}}" placeholder="Hotel Tags" id="input-tag{{$language->id}}" class="form-control">
						        </div>
						    </div>
						</div>
		            </div>
					@endif
		            @endforeach
            	</div>
            	</div>
            </div>
	        <div class="tab-pane fade" id="tab-data">
	            <div class="content">
				    <div class="form-group required">
				        <label class="col-sm-2 control-label" for="input-image">Image</label>
				        <div class="col-sm-10">
				            @if(Input::old('image'))
				            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/'.Input::old('image'))}}" alt="" title="" data-placeholder="{{URL::asset('public/admin/image/logo.png')}}"></a>
				            @else
				            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/'.$data->image)}}" alt="" title="" data-placeholder="{{URL::asset('public/admin/image/logo.png')}}"></a>
				            @endif
				            {!!Form::hidden('image',Input::old('image'),array('id'=>'input-image'))!!}
				        </div>
				    </div>
				    <div class="form-group" id="category">
				        <label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="" data-original-title="(Autocomplete)">Categories</span></label>
				        <div class="col-sm-8">
				            <select name="" id="input-status" class="form-control">
				            	@foreach($categories as $id => $name)
					                <option value="{{$id}}">{{$name}}</option>
				                @endforeach
				            </select>
		            		<div id="hotel-category" class="well well-sm" style="height: 150px; overflow: auto;">
					        	<input type="hidden" name="cate[]" value="0" id="cate">
					        	@if(Input::old('category'))
					        	@foreach($categories as $id => $name)
						        	@foreach(Input::old('category') as $cate_id)
						        		@if($cate_id==$id)
						        		<div class="cate"><input type="hidden" name="category_id[]" value="{{$cate_id}}"> {{$name}}<a href="javascript:void(0)" onclick="$(this).parent().remove()"> <i class="fa fa-minus-circle"></i> </a></div>
						        		@endif
						        	@endforeach
					        	@endforeach
					        	@else
					        	@foreach($categories as $id => $name)
						        	@foreach($data->categories()->get() as $cate_id)
						        		@if($cate_id->id==$id)
						        		<div class="cate"><input type="hidden" name="category_id[]" value="{{$cate_id->id}}"> {{$name}}<a href="javascript:void(0)" onclick="$(this).parent().remove()"> <i class="fa fa-minus-circle"></i> </a></div>
						        		@endif
						        	@endforeach
					        	@endforeach
					        	@endif
					        </div>
				        </div>
				        <div class="col-sm-2">
	            			<a href="" class="btn btn-primary" id="add_category"><i class="fa fa-plus"> Add </i></a></button>
	            		</div>
				    </div>
				    <div class="form-group required">
				        <label class="col-sm-2 control-label">Star</label>
				        <div class="col-sm-10">
				            	@for($i=1;$i<=5;$i++)
				            	<div>
						            <label class="radio-inline">
						            	@if(Input::old('star')==$i||$data->star==$i)
						            	<input type="radio" name="star" value="{{$i}}" checked="checked"> {{$i}}
						            	@else
						            	<input type="radio" name="star" value="{{$i}}"> {{$i}}
						            	@endif
							            	@for($u=1;$u<=$i;$u++)
							            	<span class="rating fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
							            	@endfor
						            </label>
				            	</div>
				            	@endfor
				        </div>
				    </div>
				    <div class="form-group required">
				        <label class="col-sm-2 control-label">Wifi</label>
				        <div class="col-sm-10">
				        	@if((Input::old('wifi')==0&&Input::old('wifi')) || $data->wifi==0)
				            <label class="radio-inline">
				            	<input type="radio" name="wifi" value="1">Yes
				            </label>
				            <label class="radio-inline">
				            	<input type="radio" name="wifi" value="0" checked="checked">No
				            </label>
				            @else
				            <label class="radio-inline">
				            	<input type="radio" name="wifi" value="1" checked="checked">Yes
				            </label>
				            <label class="radio-inline">
				            	<input type="radio" name="wifi" value="0">No
				            </label>
				            @endif
				        </div>
				    </div>
				    <div class="form-group required">
				        <label class="col-sm-2 control-label" for="input-date-available">Date Available</label>
				        <div class="col-sm-3">
				            <div class="input-group date">
				            	@if(Input::old())
				                <input type="date" name="date_available" value="{{Input::old('date_available')}}" placeholder="Date Available" id="input-date-available" class="form-control">
				                @else
				                <input type="date" name="date_available" value="{{$data->date_available}}" placeholder="Date Available" id="input-date-available" class="form-control">
				                @endif	
				            </div>
				        </div>
				    </div>
				    <div class="form-group required">
				        <label class="col-sm-2 control-label" for="input-status">Status</label>
				        <div class="col-sm-10">
				            <select name="status" id="input-status" class="form-control">
				            	@if((Input::old('status')==0&&Input::old('status'))||$data->status==0)
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
				        <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
				        @if(Input::old())
				        <div class="col-sm-10">
				            <input type="number" name="sort_order" value="{{Input::old('sort_order')}}" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
				        </div>
				        @else
				        <div class="col-sm-10">
				            <input type="number" name="sort_order" value="{{$data->sort_order}}" min="0" placeholder="Sort Order" id="input-sort-order" class="form-control">
				        </div>
				        @endif
				    </div>
	            </div>
	        </div>
            <div class="tab-pane fade" id="tab-attribute">
	            <div class="content">
				    <div class="table-responsive">
				        <table id="attribute" class="table table-striped table-bordered table-hover">
				            <thead>
				                <tr>
				                    <td class="text-left">Attribute Groups</td>
				                    <td class="text-left">Attributes</td>
				                    <td></td>
				                </tr>
				            </thead>
				            <tbody>
					        	@if(Input::old('attribute_id'))
				            	@foreach($attributes as $attribute)
				            	@foreach(Input::old('attribute_id') as $attr_id)
				            	@if($attr_id==$attribute->id)
				            	<tr class="attribute_hotel">
				                    <td class="text-left attribute_group">
				                    	<select name="attribute_group_id[]" id="input-status" class="form-control">
							            	@foreach($attributegroups as $attributegroup)
								            	@if(Input::old('attribute_group_id')==$attributegroup->id||$attribute->groups->id==$attributegroup->id)
								                <option value="{{$attributegroup->id}}" selected="selected">{{$attributegroup->name}}</option>
								                @else
								                <option value="{{$attributegroup->id}}">{{$attributegroup->name}}</option>
								                @endif
							                @endforeach
							            </select>
				                    </td>
				                    <td class="text-left attribute">
				                    	<select name="attribute_id[]" id="input-status" class="form-control">
							            	@foreach($attributegroups as $attributegroup)
								            	@if($attributegroup->id==$attribute->groups->id)
								            		@foreach($attributegroup->attributes as $attributeofgroup)
										            	@if(Input::old('attribute_id')==$attribute->id||$attributeofgroup->id==$attribute->id)
										                <option value="{{$attributeofgroup->id}}" selected="selected">{{$attributeofgroup->name}}</option>
										                @else
										                <option value="{{$attributeofgroup->id}}">{{$attributeofgroup->name}}</option>
										                @endif
								                	@endforeach
							                	@endif
							                @endforeach
							            </select>
				                    </td>
				                    <td class="text-left">
				                    	<button type="button" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button>
				                    </td>
				                </tr>
				                @endif
				                @endforeach
				                @endforeach
				            	@else
				            	@foreach($data->attributes as $attribute)
				            	<tr class="attribute_hotel">
				                    <td class="text-left attribute_group">
				                    	<select name="attribute_group_id[]" id="input-status" class="form-control">
							            	@foreach($attributegroups as $attributegroup)
								            	@if(Input::old('attribute_group_id')==$attributegroup->id||$attribute->groups->id==$attributegroup->id)
								                <option value="{{$attributegroup->id}}" selected="selected">{{$attributegroup->name}}</option>
								                @else
								                <option value="{{$attributegroup->id}}">{{$attributegroup->name}}</option>
								                @endif
							                @endforeach
							            </select>
				                    </td>
				                    <td class="text-left attribute">
				                    	<select name="attribute_id[]" id="input-status" class="form-control">
							            	@foreach($attributegroups as $attributegroup)
								            	@if($attributegroup->id==$attribute->groups->id)
								            		@foreach($attributegroup->attributes as $attributeofgroup)
										            	@if(Input::old('attribute_id')==$attribute->id||$attributeofgroup->id==$attribute->id)
										                <option value="{{$attributeofgroup->id}}" selected="selected">{{$attributeofgroup->name}}</option>
										                @else
										                <option value="{{$attributeofgroup->id}}">{{$attributeofgroup->name}}</option>
										                @endif
								                	@endforeach
							                	@endif
							                @endforeach
							            </select>
				                    </td>
				                    <td class="text-left">
				                    	<button type="button" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button>
				                    </td>
				                </tr>
				                @endforeach
				                @endif
				            </tbody>
				            <tfoot>
				                <tr>
				                    <td colspan="2"></td>
				                    <td class="text-left">
				                    	<button type="button" onclick="addAttribute();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Attribute"><i class="fa fa-plus-circle"></i></button>
				                    </td>
				                </tr>
				            </tfoot>
				        </table>
				    </div>
				</div>
            </div>
            <div class="tab-pane fade" id="tab-map">
	            <div class="content">
				    <div class="col-sm-12">
				        <div class="form-group required">
				            <label class="col-sm-2 control-label" for="input-maps-title">API</label>
			            	@if(Input::old())
				            <div class="col-sm-4">
				                <input type="text" name="maps_apil" value="{{Input::old('maps_apil')}}" placeholder="API" id="input-maps-apil" class="form-control">
				            </div>
				            <div class="col-sm-4">
				                <input type="text" name="maps_apir" value="{{Input::old('maps_apir')}}" placeholder="API" id="input-maps-apir" class="form-control">
				            </div>
				            @else
				            <div class="col-sm-4">
				                <input type="text" name="maps_apil" value="{{$data->maps_apil}}" placeholder="API" id="input-maps-apil" class="form-control">
				            </div>
				            <div class="col-sm-4">
				                <input type="text" name="maps_apir" value="{{$data->maps_apir}}" placeholder="API" id="input-maps-apir" class="form-control">
				            </div>
				            @endif
				        </div>
				    </div>
				</div>
            </div>
            <div class="tab-pane fade" id="tab-images">
	            <div class="content">
	             	<div class="table-responsive">
				        <table id="images" class="table table-striped table-bordered table-hover">
				            <thead>
				                <tr>
				                    <td class="text-left">Image</td>
				                    <td class="text-right">Sort Order</td>
				                    <td></td>
				                </tr>
				            </thead>
				            <tbody>
								<?php $image_row = 0; ?>
								@if(Input::old('slide'))
								@foreach (Input::old('slide') as $slide)
									<tr id="thumb-image" class="image-row{{$image_row}}">
										<td class="text-left"><img src="{{URL::asset('public/'.$slide['image'])}}" alt="" title="" data-placeholder="Place holder" /><input type="hidden" name="slide[{{$image_row}}][image]" value="{{$slide['image']}}" id="input-image{{$image_row}}" /></td>
										<td class="text-right"><input type="text" name="slide[{{$image_row}}][sort_order]" value="{{$slide['sort_order']}}" placeholder="Sort order" class="form-control" /></td>
										<td class="text-left"><button type="button" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
									</tr>
									<?php $image_row++; ?>
								@endforeach
								@else
								@foreach ($data->images()->get() as $slide)
									<tr id="thumb-image" class="image-row{{$image_row}}">
										<td class="text-left"><img src="{{URL::asset('public/'.$slide['image'])}}" alt="" title="" data-placeholder="Place holder" /><input type="hidden" name="slide[{{$image_row}}][image]" value="{{$slide['image']}}" id="input-image{{$image_row}}" /></td>
										<td class="text-right"><input type="text" name="slide[{{$image_row}}][sort_order]" value="{{$slide['sort_order']}}" placeholder="Sort order" class="form-control" /></td>
										<td class="text-left"><button type="button" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
									</tr>
									<?php $image_row++; ?>
								@endforeach
								@endif
				            </tbody>
				            <tfoot>
				                <tr>
				                    <td colspan="2"></td>
				                    <td class="text-left"><button type="button" id="button-slide" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
				                </tr>
				            </tfoot>
				        </table>
				    </div>
				</div>
            </div>
            <div class="tab-pane fade" id="tab-rooms">
	            <div class="content">
	              	<div class="row">
	              		<div class="pull-right">
	              			<button type="button" data-toggle="tooltip" title="" class="btn btn-default tab-rooms" data-original-title="Refresh"><i class="glyphicon glyphicon-refresh"></i></button>
	              		</div>
			        	<div class="col-sm-12 rooms">
			        	</div>
			    	</div>
		    	</div>
            </div>
          </div>
          {!!Form::close()!!}
      </div>
@stop
@section('script')
{!!Html::script('public/admin/summernote/summernote.js')!!}
{!!Html::style('public/admin/summernote/summernote.css')!!}
<script type="text/javascript"><!--
	@foreach($languages as $language)
		$("#input-description_{{$language->id}}").summernote({height: 300});
		$("#input-short_description_{{$language->id}}").summernote({height: 300});
	@endforeach
//--></script>
<script type="text/javascript"><!--
  $('.tab-rooms').click( function(){
     $('#tab-rooms .rooms').load('{{URL::route("room_list_get",array("id"=>$data->id))}}');
  });
        //--></script>
<script type="text/javascript">
	$(document).on('click',function(){
		$(".attribute_hotel").find("select").change(function(e){
			$id=$(this).val();
			$attr=$(this).parent().next(".attribute");
			e.preventDefault();
			$url="{{URL::route('hotel_attribute_get')}}";
			$.ajax({
				"url":$url,
				"type":"get",
				"data":{"id":$id},
				"async":true,
				"success":function(data){
					$attr.find("select").remove();
					$attr.append(data);
				}
			});
		})
	})
</script>
<script type="text/javascript"><!--
        function addAttribute() {
        	html='<tr class="attribute_hotel">';
        	html+='<td class="text-left attribute_group">';
        	html+='<select name="attribute_group_id[]" id="input-status" class="form-control">';
        	@foreach($attributegroups as $attributegroup)
	        html+='<option value="{{$attributegroup->id}}">{{$attributegroup->name}}</option>';
	        @endforeach
        	html+='</select>'
        	html+='</td>';
        	html+='<td class="text-left attribute">';
        	html+='<select name="attribute_id[]" id="input-status" class="form-control">';
        	@foreach($attributegroups as $attributegroup)
    		@foreach($attributegroup->attributes as $attributeofgroup)
		    html+='<option value="{{$attributeofgroup->id}}">{{$attributeofgroup->name}}</option>';
        	@endforeach
        	<?php break;?>
            @endforeach
        	html+='</select>'
        	html+='</td>';
        	html+='<td class="text-left">';
        	html+='<button type="button" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button>';
        	html+='</td>';
        	html+='</tr>';
            $('#attribute tbody').append(html);
        }
//--></script>
<script type="text/javascript"><!--
		$(document).ready(function(){
			$val=$("#category select").val();
			$("#cate").val($val);
			$("#category").find("select").change(function(){
				$val=$(this).val();
				$("#cate").val($val);
			})
			$("#add_category").on('click',function(e){
				e.preventDefault();
				$id=$('#cate').val();
				$url="{{URL::route('hotel_category_get')}}";
				$.ajax({
					"url":$url,
					"type":"get",
					"data":{"id":$id},
					"async":true,
					"success":function(data){
						$("#hotel-category").append(data);
					}
				});
			})
		})
//--></script>
<script type="text/javascript"><!--
var image_row = {{$image_row}} ;
	function addImage(image,value) {
		html = '<tr id="thumb-image" class="image-row' + image_row + '">';
		html += '  <td class="text-left"><img src="' + image + '" alt="" title="" data-placeholder="Place holder" /><input type="hidden" name="slide[' + image_row + '][image]" value="' + value + '" id="input-image' + image_row + '" /></td>';
		html += '  <td class="text-right"><input type="text" name="slide[' + image_row + '][sort_order]" value="" placeholder="Sort order" class="form-control" /></td>';
		html += '  <td class="text-left"><button type="button" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
		html += '</tr>';
		$('#images tbody').append(html);
		image_row++;
	}
//--></script> 
<script>
  $(function () {
    $('#language a:first').tab('show')
  })
</script>
@stop
