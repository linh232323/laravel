@extends('admin.admin')
@section('content')
<div class="panel-body">
          {!!Form::model($data,array('route'=>'room_edit_post','id'=>'form-category','files'=>true,'class'=>'form-horizontal'))!!}
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="pull-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save </i></button>
          </div>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab"> General </a></li>
            <li><a href="#tab-data" data-toggle="tab"> Data </a></li>
            <li><a href="#tab-price" data-toggle="tab"> Price </a></li>
            <li><a href="#tab-attribute" data-toggle="tab"> Attribute </a></li>
            <li><a href="#tab-images" data-toggle="tab"> Images </a></li>
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
							    <label class="col-sm-2 control-label" for="input-name{{$language->id}}">Room Name</label>
							    <div class="col-sm-10">
							    	@if(Input::old())
							        <input type="text" name="name_{{$language->id}}" value="{{Input::old('name_'.$language->id)}}" placeholder="Room Name" id="input-name{{$language->id}}" class="form-control">
							        @else
							        <input type="text" name="name_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->name}}" placeholder="Room Name" id="input-name{{$language->id}}" class="form-control">
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
						    	<label class="col-sm-2 control-label" for="input-description_{{$language->id}}">Short Description</label>
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
						        <label class="col-sm-2 control-label" for="input-tag{{$language->id}}"><span data-toggle="tooltip" title="" data-original-title="comma separated">Room Tags</span></label>
						        <div class="col-sm-10">
						        	@if(Input::old())
						            <input type="text" name="tag_{{$language->id}}" value="{{Input::old('tag_'.$language->id)}}" placeholder="Room Tags" id="input-tag{{$language->id}}" class="form-control">
						            @else
						            <input type="text" name="tag_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->tag}}" placeholder="Room Tags" id="input-tag{{$language->id}}" class="form-control">
						            @endif
						        </div>
						    </div>
						</div>
		            </div>
		            @else
		            <div class="tab-pane fade" id="tab-{{$language->code}}">
						<div class="content">						
							<div class="form-group required">
							    <label class="col-sm-2 control-label" for="input-name{{$language->id}}">Room Name</label>
							    <div class="col-sm-10">
							        <input type="text" name="name_{{$language->id}}" value="{{Input::old('name_'.$language->id)}}" placeholder="Room Name" id="input-name{{$language->id}}" class="form-control">
							    </div>
							</div>
						    <div class="form-group required">
						    	<label class="col-sm-2 control-label" for="input-description_1">Description</label>
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
						        <label class="col-sm-2 control-label" for="input-tag{{$language->id}}"><span data-toggle="tooltip" title="" data-original-title="comma separated">Room Tags</span></label>
						        <div class="col-sm-10">
						            <input type="text" name="tag_{{$language->id}}" value="{{Input::old('tag_'.$language->id)}}" placeholder="Room Tags" id="input-tag{{$language->id}}" class="form-control">
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
				            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="{{URL::asset('public/admin/image/logo.png')}}" alt="" title="" data-placeholder="{{URL::asset('public/admin/image/logo.png')}}"></a>
				            @endif
				            {!!Form::hidden('image',Input::old('image'),array('id'=>'input-image'))!!}
				        </div>
				    </div>
				    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
                        <div class="col-sm-10">
			            	@if(Input::old())
                            <input type="text" name="quantity" value="{{Input::old('quantity')}}" placeholder="Quantity" id="input-quantity" class="form-control">
                            @else
                            <input type="text" name="quantity" value="{{$data->quantity}}" placeholder="Quantity" id="input-quantity" class="form-control">
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-minimum">Min Adults</label>
                        <div class="col-sm-10">
			            	@if(Input::old())
                            <input type="text" name="minimum" value="{{Input::old('minimum')}}" placeholder="Minimum Quantity" id="input-minimum" class="form-control">
                            @else
                            <input type="text" name="minimum" value="{{$data->minimum}}" placeholder="Minimum Quantity" id="input-minimum" class="form-control">
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-maxadults">Max Adults</label>
                        <div class="col-sm-10">
			            	@if(Input::old())
                            <input type="text" name="maxadults" value="{{Input::old('maxadults')}}" placeholder="Max Adults" id="input-maxadults" class="form-control">
                            @else
                            <input type="text" name="maxadults" value="{{$data->maxadults}}" placeholder="Max Adults" id="input-maxadults" class="form-control">
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
				            <input type="text" name="sort_order" value="{{Input::old('sort_order')}}" placeholder="Sort Order" id="input-sort-order" class="form-control">
				        </div>
				        @else
				        <div class="col-sm-10">
				            <input type="text" name="sort_order" value="{{$data->sort_order}}" placeholder="Sort Order" id="input-sort-order" class="form-control">
				        </div>
				        @endif
				    </div>
	            </div>
	        </div>
	        <div class="tab-pane fade" id="tab-price">
	            <div class="content">
	                <div class="table-responsive">
	                    <table id="price" class="table table-striped table-bordered table-hover">
	                        <thead>
	                            <tr>
	                                <td class="text-left">Price net</td>
	                                <td class="text-left col-md-1">Price percent</td>
	                                <td class="text-left">Price gross</td>
	                                <td class="text-left">Extra net</td>
	                                <td class="text-left col-md-1">Extra percent</td>
	                                <td class="text-left">Extra gross</td>
	                                <td class="text-left col-md-1">Discount</td>
	                                <td class="text-left col-md-3">Date</td>
	                                <td width="40px"></td>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<?php $i=1;?>
	                        	@if(Input::old('price'))
	                        	@foreach(Input::old('price') as $value)
	                        	<tr>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][price_net]" value="{{$value['price_net']}}" min="0" placeholder="Price net" class="form-control price_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][price_percent]" value="{{$value['price_percent']}}" min="0" max="100" placeholder="Price percent" class="form-control price_percent">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][price_gross]" value="{{$value['price_net']+$value['price_net']*$value['price_percent']/100}}" min="0" placeholder="Price gross" class="form-control price_gorss" id="disabledInput" onClick="priceTotal($(this));" readonly>
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][extra_net]" value="{{$value['extra_net']}}" min="0" placeholder="Extra net" class="form-control extra_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][extra_percent]" value="{{$value['extra_percent']}}" min="0" max="100" placeholder="Extra percent" class="form-control extra_percent">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][extra_gross]" value="{{$value['extra_net']+$value['extra_net']*$value['extra_percent']/100}}" min="0" placeholder="Extra gross" class="form-control extra_gross" id="disabledInput" onClick="extraTotal($(this));" readonly>
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][discount]" value="{{$value['discount']}}" min="0" max="100" placeholder="Discount" class="form-control">
	                        		</td>  
	                        		<td class="text-left">
	                        			<div class="input-group"><span class="input-group-addon">Date_form</span>
	                        				<input type="date" value="{{$value['date_form']}}" min="{{date('Y-m-d')}}" name="price[{{$i}}][date_form]" rows="1" placeholder="dd/mm/yyyy" class="form-control">
	                        			</div>
	                        			<div class="input-group"><span class="input-group-addon">Date_to</span>
	                        				<input type="date" value="{{$value['date_to']}}" min="{{date('Y-m-d')}}" name="price[{{$i}}][date_to]" rows="1" placeholder="dd/mm/yyyy" class="form-control">
	                        			</div>  
	                        		</td>  
	                        		<td class="text-left">
	                        			<button type="button" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
	                        		</td>
	                        	</tr>
	                        	<?php $i++;?>
	                        	@endforeach
	                        	@else
	                        	@foreach($data->prices as $value)
	                        	<tr>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][price_net]" value="{{$value['price_net']}}" min="0" placeholder="Price net" class="form-control price_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][price_percent]" value="{{$value['price_percent']}}" min="0" max="100" placeholder="Price percent" class="form-control price_percent">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][price_gross]" value="{{$value['price_net']+$value['price_net']*$value['price_percent']/100}}" min="0" placeholder="Price gross" class="form-control price_gorss" id="disabledInput" onClick="priceTotal($(this));" readonly>
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][extra_net]" value="{{$value['extra_net']}}" min="0" placeholder="Extra net" class="form-control extra_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][extra_percent]" value="{{$value['extra_percent']}}" min="0" max="100" placeholder="Extra percent" class="form-control extra_percent">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][extra_gross]" value="{{$value['extra_net']+$value['extra_net']*$value['extra_percent']/100}}" min="0" placeholder="Extra gross" class="form-control extra_gross" id="disabledInput" onClick="extraTotal($(this));" readonly>
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][discount]" value="{{$value['discount']}}" min="0" max="100" placeholder="Discount" class="form-control">
	                        		</td>  
	                        		<td class="text-left">
	                        			<div class="input-group"><span class="input-group-addon">Date_form</span>
	                        				<input type="date" value="{{$value['date_form']}}" min="{{date('Y-m-d')}}" name="price[{{$i}}][date_form]" rows="1" placeholder="dd/mm/yyyy" class="form-control">
	                        			</div>
	                        			<div class="input-group"><span class="input-group-addon">Date_to</span>
	                        				<input type="date" value="{{$value['date_to']}}" min="{{date('Y-m-d')}}" name="price[{{$i}}][date_to]" rows="1" placeholder="dd/mm/yyyy" class="form-control">
	                        			</div>  
	                        		</td>  
	                        		<td class="text-left">
	                        			<button type="button" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
	                        		</td>
	                        	</tr>
	                        	<?php $i++;?>
	                        	@endforeach
	                        	@endif
	                        </tbody>
	                        <tfoot>
	                            <tr>
	                                <td colspan="8"></td>
	                                <td class="text-left"><button type="button" onclick="addPrice();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Price"><i class="fa fa-plus-circle"></i></button></td>
	                            </tr>
	                        </tfoot>
	                    </table>
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
				            	<tr class="attribute_room">
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
				            	<tr class="attribute_room">
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
<script type="text/javascript">
	$(document).on('click',function(){
		$(".attribute_room").find("select").change(function(e){
			$id=$(this).val();
			$attr=$(this).parent().next(".attribute");
			e.preventDefault();
			$url="{{URL::route('room_attribute_get')}}";
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
        	html='<tr class="attribute_room">';
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
        	<?php break; ?>
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
var price_row = {{$i}};

function addPrice() {
    html  = '<tr>';
	html += '  <td class="text-left" ><input type="number" name="price['+ price_row +'][price_net]" value="" min="0" placeholder="Price net" class="form-control price_net" /><input type="hidden" name="price_row" value="'+ price_row +'" </td>';
	html += '  <td class="text-left" ><input type="number" name="price['+ price_row +'][price_percent]" value="" min="0" max="100" placeholder="Price percent" class="form-control price_percent" /></td>';
	html += '  <td class="text-left" ><input type="number" name="price['+ price_row +'][price_gross]" value="" min="0" placeholder="Price gross" class="form-control price_gross" id="disabledInput" onClick="priceTotal($(this));" readonly/></td>';
	html += '  <td class="text-left" ><input type="number" name="price['+ price_row +'][extra_net]" value="" min="0" placeholder="Extra net" class="form-control extra_net" /></td>';
	html += '  <td class="text-left" ><input type="number" name="price['+ price_row +'][extra_percent]" value="" min="0" max="100" placeholder="Extra percent" class="form-control extra_percent" /></td>';
	html += '  <td class="text-left" ><input type="number" name="price['+ price_row +'][extra_gross]" value="" min="0" placeholder="Extra gross" class="form-control extra_gross" id="disabledInput" onClick="extraTotal($(this));" readonly/></td>';
	html += '  <td class="text-left" ><input type="number" name="price['+ price_row +'][discount]" value="" min="0" max="100" placeholder="Discount" class="form-control" /></td>';
	html += '  <td class="text-left">';
	html += '<div class="input-group"><span class="input-group-addon">Date_form</span><input type="date" name="price['+ price_row +'][date_form]" rows="1" value="{{date('Y-m-d')}}" placeholder="dd/mm/yyyy" min="{{date('Y-m-d')}}" class="form-control"/></div>';
	html += '<div class="input-group"><span class="input-group-addon">Date_to</span><input type="date" name="price['+ price_row +'][date_to]" rows="1" value="{{date('Y-m-d')}}" placeholder="dd/mm/yyyy" min="{{date('Y-m-d')}}" class="form-control"/></div>';
	html += '  </td>';
	html += '  <td class="text-left"><button type="button" onclick="$(this).parent().parent().remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
	price_row++;
	
	$('#price tbody').append(html);
}
//--></script>
<script type="text/javascript">
	function priceTotal(that){
		var val_net = new Number($(that).parent().parent().find('.price_net').val());
		var val_percent = new Number($(that).parent().parent().find('.price_percent').val());
		$total=val_net + val_net * val_percent / 100;
		$(that).val($total);
	}
	function extraTotal(that){
		var val_net = new Number($(that).parent().parent().find('.extra_net').val());
		var val_percent = new Number($(that).parent().parent().find('.extra_percent').val());
		$total=val_net + val_net * val_percent / 100;
		$(that).val($total);
	}
</script>
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
