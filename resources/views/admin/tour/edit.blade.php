@extends('admin.admin')
@section('content')
<div class="panel-body">
          {!!Form::model($data,array('route'=>array('admin.tour.update',$data->id),'method'=>'PUT','id'=>'form-category','files'=>true,'class'=>'form-horizontal'))!!}
          <div class="pull-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save </i></button>
          </div>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab"> General </a></li>
            <li><a href="#tab-data" data-toggle="tab"> Data </a></li>
            <li><a href="#tab-schedule" data-toggle="tab"> Schedules </a></li>
            <li><a href="#tab-attention" data-toggle="tab"> Attentions </a></li>
            <li><a href="#tab-price" data-toggle="tab"> Prices </a></li>
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
							    <label class="col-sm-2 control-label" for="input-name{{$language->id}}">Tour Name</label>
							    <div class="col-sm-10">
							    	@if(Input::old())
							        <input type="text" name="name_{{$language->id}}" value="{{Input::old('name_'.$language->id)}}" placeholder="Tour Name" id="input-name{{$language->id}}" class="form-control">
							        @else
							        <input type="text" name="name_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->name}}" placeholder="Tour Name" id="input-name{{$language->id}}" class="form-control">
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
						    	<label class="col-sm-2 control-label" for="input-information_{{$language->id}}">Information</label>
						    	<div class="col-sm-10">
						    		@if(Input::old())
						    		<textarea name="information_{{$language->id}}" placeholder="Description" id="input-information_{{$language->id}}" >{{Input::old('short_description_'.$language->id)}}</textarea>
						    		@else
						    		<textarea name="information_{{$language->id}}" placeholder="Description" id="input-information_{{$language->id}}" >{{$data->descriptions()->where('languageID',$language->id)->first()->information}}</textarea>
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
						        <label class="col-sm-2 control-label" for="input-tag{{$language->id}}"><span data-toggle="tooltip" title="" data-original-title="comma separated">Tour Tags</span></label>
						        <div class="col-sm-10">
						        	@if(Input::old())
						            <input type="text" name="tag_{{$language->id}}" value="{{Input::old('tag_'.$language->id)}}" placeholder="Tour Tags" id="input-tag{{$language->id}}" class="form-control">
						            @else
						            <input type="text" name="tag_{{$language->id}}" value="{{$data->descriptions()->where('languageID',$language->id)->first()->tag}}" placeholder="Tour Tags" id="input-tag{{$language->id}}" class="form-control">
						            @endif
						        </div>
						    </div>
						</div>
		            </div>
		            @else
		            <div class="tab-pane fade" id="tab-{{$language->code}}">
							<div class="content">
								<div class="form-group required">
								    <label class="col-sm-2 control-label" for="input-name{{$language->id}}">Tour Name</label>
								    <div class="col-sm-10">
								        <input type="text" name="name_{{$language->id}}" value="{{Input::old('name_'.$language->id)}}" placeholder="Tour Name" id="input-name{{$language->id}}" class="form-control">
								    </div>
								</div>
							    <div class="form-group required">
							    	<label class="col-sm-2 control-label" for="input-description_{{$language->id}}">Description</label>
							    	<div class="col-sm-10">
							    		<textarea name="description_{{$language->id}}" placeholder="Description" id="input-description_{{$language->id}}">{{Input::old('description_'.$language->id)}}</textarea>
							    	</div>
							    </div>
							    <div class="form-group required">
							    	<label class="col-sm-2 control-label" for="input-information_{{$language->id}}">Information</label>
							    	<div class="col-sm-10">
							    		<textarea name="information_{{$language->id}}" placeholder="Description" id="input-information_{{$language->id}}" >{{Input::old('information_'.$language->id)}}</textarea>
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
							        <label class="col-sm-2 control-label" for="input-tag{{$language->id}}"><span data-toggle="tooltip" title="" data-original-title="comma separated">Tour Tags</span></label>
							        <div class="col-sm-10">
							            <input type="text" name="tag_{{$language->id}}" value="{{Input::old('tag_'.$language->id)}}" placeholder="Tour Tags" id="input-tag{{$language->id}}" class="form-control">
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
				    <div class="form-group" id="category">
				        <label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="" data-original-title="(Autocomplete)">Categories</span></label>
				        <div class="col-sm-8">
				            <select name="" id="input-status" class="form-control">
				            	@foreach($categories as $id => $name)
					                <option value="{{$id}}">{{$name}}</option>
				                @endforeach
				            </select>
		            		<div id="tour-category" class="well well-sm" style="height: 150px; overflow: auto;">
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
                        <label class="col-sm-2 control-label" for="input-adult">Adult</label>
                        <div class="col-sm-2">
          					{!!Form::number('adult',Input::old('adult'),array("placeholder"=>"Adult", "id"=>"input-adult", "class"=>"form-control"))!!}
                        </div>
                        <label class="col-sm-2 control-label" for="input-child">Child(5-12)</label>
                        <div class="col-sm-2">
          					{!!Form::number('child',Input::old('child'),array("placeholder"=>"Child(5-12)", "id"=>"input-child", "class"=>"form-control"))!!}
                        </div>
                        <label class="col-sm-2 control-label" for="input-baby">Child(0-5)</label>
                        <div class="col-sm-2">
          					{!!Form::number('baby',Input::old('baby'),array("placeholder"=>"Child(0-5)", "id"=>"input-baby", "class"=>"form-control"))!!}
                        </div>
                    </div>
				    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-departute-time">Departure Time</label>
                        <div class="col-sm-3">
                            <div class="input-group date">
          					{!!Form::date('departure_time',Input::old('departure_time'),array("placeholder"=>"Departure Time", "id"=>"input-departure_time", "class"=>"form-control"))!!}
                        	</div>
                        </div>
                    </div>
				    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-days">Days</label>
                        <div class="col-sm-4">
                            <select name="days" id="input-days" class="form-control">
                                <option value="">Days</option>
                                @for($p=1;$p<=10;$p++)
                                @if(Input::old('days')==$p)
                                <option value="{{$p}}" selected>{{$p}}</option>
                                @elseif($data->days=$p)
                                <option value="{{$p}}" selected>{{$p}}</option>
                                @else
                                <option value="{{$p}}">{{$p}}</option>
                                @endif
                                @endfor
                            </select>
                        </div>
                        <label class="col-sm-2 control-label" for="input-nights">Nights</label>
                        <div class="col-sm-4">
                            <select name="nights" id="input-nights" class="form-control">
                                <option value="">Nights</option>
                                @for($p=1;$p<=10;$p++)
                                @if(Input::old('nights')==$p)
                                <option value="{{$p}}" selected>{{$p}}</option>
                                @elseif($data->nights=$p)
                                <option value="{{$p}}" selected>{{$p}}</option>
                                @else
                                <option value="{{$p}}">{{$p}}</option>
                                @endif
                                @endfor
                        	</select>
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
				        <label class="col-sm-2 control-label" for="input-date-available">Date Available</label>
				        <div class="col-sm-3">
				            <div class="input-group date">
          					{!!Form::date('date_available',Input::old('date_available'),array("placeholder"=>"Date Available", "id"=>"input-date_available", "class"=>"form-control"))!!}
				            </div>
				        </div>
				    </div>
				    <div class="form-group required">
				        <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
				        <div class="col-sm-10">
      					{!!Form::number('sort_order',Input::old('sort_order'),array("placeholder"=>"Sort Order", "id"=>"input-sort_order", "class"=>"form-control"))!!}
				    	</div>
				    </div>
	            </div>
	        </div>

	        <div class="tab-pane fade" id="tab-price">
	            <div class="content">
	                <div class="table-responsive">
	                    <table id="price" class="table table-striped table-bordered table-hover">
	                        <thead>
	                        	<tr>
                                    <td class="text-left">Adult</td>
                                    <td class="text-left col-md-1">Percent</td>
                                    <td class="text-left">Child (5-12)</td>
                                    <td class="text-left col-md-1">Percent</td>
                                    <td class="text-left">Child (0-5)</td>
                                    <td class="text-left col-md-1">Percent</td>
                                    <td class="text-left col-md-1">Discount</td>
                                    <td class="text-left col-md-3">Date</td>
                                    <td width="40px"></td>
                                </tr>
	                        </thead>
	                        <tbody>
	                        	<?php $i=1;?>
	                        	@if(Input::old('price'))
	                        	@foreach(Input::old('price') as $value)
	                        	<tr class="price_row_{{$i}}">  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][adult_net]" value="{{$value['adult_net']}}" min="0" placeholder="Adult net" class="form-control adult_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][adult_percent]" value="{{$value['adult_percent']}}" min="0" max="100" placeholder="Adult percent" class="form-control adult_percent">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][child_net]" value="{{$value['child_net']}}" min="0" placeholder="Child net" class="form-control child_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][child_percent]" value="{{$value['child_percent']}}" min="0" max="100" placeholder="Child percent" class="form-control child_percent">
	                        		</td>   
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][baby_net]" value="{{$value['baby_net']}}" min="0" placeholder="Baby net" class="form-control baby_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][baby_percent]" value="{{$value['baby_percent']}}" min="0" max="100" placeholder="Baby percent" class="form-control baby_percent">
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
	                        		<td class="text-left" rowspan="2">
	                        			<button type="button" onclick="$('.price_row_{{$i}}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
	                        		</td>
	                        	</tr>
	                        	<tr class="price_row_{{$i}}">
	                        		<td class="text-left">
	                        			Adult Gross
	                        		</td>
	                        		<td class="text-left">
										<input type="number" name="price[{{$i}}][adult_gross]" value="{{$value['adult_net']+$value['adult_net']*$value['adult_percent']/100}}" min="0" placeholder="Adult gross" class="form-control adult_gross" id="disabledInput" onClick="adultTotal('price_row_{{$i}}');" readonly/>
	                        		</td>  
	                        		<td class="text-left">
	                        			Child(5-12) Gross
	                        		</td>
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][child_gross]" value="{{$value['child_net']+$value['child_net']*$value['child_percent']/100}}" min="0" placeholder="Child gross" class="form-control child_gross" id="disabledInput" onClick="childTotal('price_row_{{$i}}');" readonly/>
	                        		</td>  
	                        		<td class="text-left">
	                        			Child(0-12) Gross
	                        		</td>
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][baby_gross]" value="{{$value['baby_net']+$value['baby_net']*$value['baby_percent']/100}}" min="0" placeholder="Baby gross" class="form-control baby_gross" id="disabledInput" onClick="babyTotal('price_row_{{$i}}');" readonly/>
	                        		</td>  
	                        		<td></td>
	                        		<td></td>
	                        	</tr>
	                        	<?php $i++;?>
	                        	@endforeach
	                        	@else
	                        	@foreach($data->prices as $value)
	                        	<tr class="price_row_{{$i}}">  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][adult_net]" value="{{$value['adult_net']}}" min="0" placeholder="Adult net" class="form-control adult_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][adult_percent]" value="{{$value['adult_percent']}}" min="0" max="100" placeholder="Adult percent" class="form-control adult_percent">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][child_net]" value="{{$value['child_net']}}" min="0" placeholder="Child net" class="form-control child_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][child_percent]" value="{{$value['child_percent']}}" min="0" max="100" placeholder="Child percent" class="form-control child_percent">
	                        		</td>   
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][baby_net]" value="{{$value['baby_net']}}" min="0" placeholder="Baby net" class="form-control baby_net">
	                        		</td>  
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][baby_percent]" value="{{$value['baby_percent']}}" min="0" max="100" placeholder="Baby percent" class="form-control baby_percent">
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
	                        		<td class="text-left" rowspan="2">
	                        			<button type="button" onclick="$('.price_row_{{$i}}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
	                        		</td>
	                        	</tr>
	                        	<tr class="price_row_{{$i}}">
	                        		<td class="text-left">
	                        			Adult Gross
	                        		</td>
	                        		<td class="text-left">
										<input type="number" name="price[{{$i}}][adult_gross]" value="{{$value['adult_net']+$value['adult_net']*$value['adult_percent']/100}}" min="0" placeholder="Adult gross" class="form-control adult_gross" id="disabledInput" onClick="adultTotal('price_row_{{$i}}');" readonly/>
	                        		</td>  
	                        		<td class="text-left">
	                        			Child(5-12) Gross
	                        		</td>
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][child_gross]" value="{{$value['child_net']+$value['child_net']*$value['child_percent']/100}}" min="0" placeholder="Child gross" class="form-control child_gross" id="disabledInput" onClick="childTotal('price_row_{{$i}}');" readonly/>
	                        		</td>  
	                        		<td class="text-left">
	                        			Child(0-12) Gross
	                        		</td>
	                        		<td class="text-left">
	                        			<input type="number" name="price[{{$i}}][baby_gross]" value="{{$value['baby_net']+$value['baby_net']*$value['baby_percent']/100}}" min="0" placeholder="Baby gross" class="form-control baby_gross" id="disabledInput" onClick="babyTotal('price_row_{{$i}}');" readonly/>
	                        		</td>  
	                        		<td></td>
	                        		<td></td>
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
	        <div class="tab-pane fade" id="tab-schedule">
	        	<div class="tab-pane fade active in" id="tab-general">
					<div class="content">
						<table id="schedule-table" class="table table-striped table-hover">
							<thead>
								<tr>
									<td class="col-sm-1 text-center"> Transporter </td>
									<td class="col-sm-10 text-center"> Detail </td class="col-sm-2">
									<td class="col-sm-1 text-center"> Action </td>
								</tr>
							</thead>
							<tbody>
								<?php $u=1; ?>
								@if(Input::old('schedule'))
								@foreach(Input::old('schedule') as $value)
								<tr class ="schedule_row_{{$u}}">
									<td class="col-sm-1">
									</td>
									<td class="col-sm-10">
										<ul class="nav nav-tabs" id="language_schedule_{{$u}}"> 
											@foreach($languages as $language)
											<li><a href="#schedule-{{$u}}{{$language->code}}" data-toggle="tab" aria-expanded="true"><img src="{{URL::asset("public/admin/image/flags/$language->image")}}" title="{{$language->name}}"> {{$language->name}} </a></li>
											@endforeach
										</ul>
									</td>
									<td></td>
								</tr>
								<tr class ="schedule_row_{{$u}}">
									<td class="col-sm-1">
										<div class="content">
										{!!Form::select("schedule[$u][transporter]", $transporters ,$value['transporter'],array( "id"=>"input-transporters", "class"=>"form-control"))!!}
										</div>
									</td>
									<td class="col-sm-10">
										<div class="tab-content">
											@foreach($languages as $language)
											<div class="tab-pane fade" id="schedule-{{$u}}{{$language->code}}">
												<div class="content">
													<div class="form-group required">
														<label class="col-sm-2 control-label" for="input-schedule-title{{$language->id}}">Title</label>
														<div class="col-sm-6">
															<input name="schedule[{{$u}}][title_{{$language->id}}]" rows="5" placeholder="Title" id="input-schedule-title1{{$language->id}}" class="form-control" value="{{$value['title_'.$language->id]}}">
														</div>
														<div class="col-lg-2">
															<button type="button" class="btn btn-primary edit" onclick="editSchedule($(this));">Edit</button>
														</div>
													</div>
													<div class="form-group required">
														<div class="col-sm-12">
															<textarea name="schedule[{{$u}}][schedule_{{$language->id}}]" placeholder="Tour Details" class="input-schedule" id="input-schedule{{$language->id}}-{{$u}}" cols="40" rows="20" style="display: none;">{{$value['schedule_'.$language->id]}}</textarea>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</td>	
									<td>
										<div class="content">
											<button type="button" onclick="$('.schedule_row_{{$u}}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
										</div>
									</td>
								</tr>
								<script type="text/javascript">
								    $(function () {
										$("#language_schedule_{{$u}} a:first").tab('show')
									})
								</script>
								<?php $u++; ?>
								@endforeach
								@else
								@foreach($data->schedules as $value)
								@if($value->serial==$u)
								<tr class ="schedule_row_{{$u}}">
									<td class="col-sm-1">
									</td>
									<td class="col-sm-10">
										<ul class="nav nav-tabs" id="language_schedule_{{$u}}"> 
											@foreach($languages as $language)
											<li><a href="#schedule-{{$u}}{{$language->code}}" data-toggle="tab" aria-expanded="true"><img src="{{URL::asset("public/admin/image/flags/$language->image")}}" title="{{$language->name}}"> {{$language->name}} </a></li>
											@endforeach
										</ul>
									</td>
									<td></td>
								</tr>
								<tr class ="schedule_row_{{$u}}">
									<td class="col-sm-1">
										<div class="content">
										{!!Form::select("schedule[$u][transporter]", $transporters ,$value->transporter,array( "id"=>"input-transporters", "class"=>"form-control"))!!}
										</div>
									</td>
									<td class="col-sm-10">
										<div class="tab-content">
											@foreach($languages as $language)
											@if($data->schedules()->where('languageID',$language->id)->where('serial',$u)->first())
											<div class="tab-pane fade" id="schedule-{{$u}}{{$language->code}}">
												<div class="content">
													<div class="form-group required">
														<label class="col-sm-2 control-label" for="input-schedule-title{{$language->id}}">Title</label>
														<div class="col-sm-6">
															<input name="schedule[{{$u}}][title_{{$language->id}}]" rows="5" placeholder="Title" id="input-schedule-title1{{$language->id}}" class="form-control" value="{{$data->schedules()->where('languageID',$language->id)->where('serial',$u)->first()->title}}">
														</div>
														<div class="col-lg-2">
															<button type="button" class="btn btn-primary edit" onclick="editSchedule($(this));">Edit</button>
														</div>
													</div>
													<div class="form-group required">
														<div class="col-sm-12">
															<textarea name="schedule[{{$u}}][schedule_{{$language->id}}]" placeholder="Tour Details" class="input-schedule" id="input-schedule{{$language->id}}-{{$u}}" cols="40" rows="20" style="display: none;">{{$data->schedules()->where('languageID',$language->id)->where('serial',$u)->first()->text}}</textarea>
														</div>
													</div>
												</div>
											</div>
											@else
											<div class="tab-pane fade" id="schedule-{{$u}}{{$language->code}}">
												<div class="content">
													<div class="form-group required">
														<label class="col-sm-2 control-label" for="input-schedule-title{{$language->id}}">Title</label>
														<div class="col-sm-6">
															<input name="schedule[{{$u}}][title_{{$language->id}}]" rows="5" placeholder="Title" id="input-schedule-title1{{$language->id}}" class="form-control" value="">
														</div>
														<div class="col-lg-2">
															<button type="button" class="btn btn-primary edit" onclick="editSchedule($(this));">Edit</button>
														</div>
													</div>
													<div class="form-group required">
														<div class="col-sm-12">
															<textarea name="schedule[{{$u}}][schedule_{{$language->id}}]" placeholder="Tour Details" class="input-schedule" id="input-schedule{{$language->id}}-{{$u}}" cols="40" rows="20" style="display: none;"></textarea>
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
										</div>
									</td>	
									<td>
										<div class="content">
											<button type="button" onclick="$('.schedule_row_{{$u}}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
										</div>
									</td>
								</tr>
								<script type="text/javascript">
								    $(function () {
										$("#language_schedule_{{$u}} a:first").tab('show')
									})
								</script>
								<?php $u++; ?>
								@endif
								@endforeach
								@endif
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2"></td>
									<td>
					            		<button type="button" onclick="addSchedule();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Schedule"><i class="fa fa-plus-circle"></i></button>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
            </div>
	        <div class="tab-pane fade" id="tab-attention">
	        	<div class="tab-pane fade active in" id="tab-general">
					<div class="content">
						<table id="attention-table" class="table table-striped table-hover">
							<thead>
								<tr>
									<td class="col-sm-11 text-center"> Attention </td>
									<td class="col-sm-1 text-center"> Action </td>
								</tr>
							</thead>
							<tbody>
								<?php $o=1; ?>
								@if(Input::old('attention'))
								@foreach(Input::old('attention') as $value)
								<tr class ="attention_row_{{$o}}">
									<td class="col-sm-11">
										<ul class="nav nav-tabs" id="language_attention_{{$o}}"> 
											@foreach($languages as $language)
											<li><a href="#attention-{{$o}}{{$language->code}}" data-toggle="tab" aria-expanded="true"><img src="{{URL::asset("public/admin/image/flags/$language->image")}}" title="{{$language->name}}"> {{$language->name}} </a></li>
											@endforeach
										</ul>
									</td>
									<td class="col-sm-1"></td>
								</tr class ="attention_row_{{$o}}">
								<tr class ="attention_row_{{$o}}">
									<td class="col-sm-11">
										<div class="tab-content">
											@foreach($languages as $language)
											<div class="tab-pane fade" id="attention-{{$o}}{{$language->code}}">
												<div class="content">
													<div class="form-group required">
														<label class="col-sm-2 control-label" for="input-attention-title{{$language->id}}">Title</label>
														<div class="col-sm-6">
															<input name="attention[{{$o}}][title_{{$language->id}}]" rows="5" placeholder="Title" id="input-attention-title{{$language->id}}" class="form-control" value="{{$value['title_'.$language->id]}}">
														</div>
														<div class="col-lg-2">
															<button type="button" class="btn btn-primary edit" onclick="editAttention($(this));">Edit</button>
														</div>
													</div>
													<div class="form-group required">
														<div class="col-sm-12">
															<textarea name="attention[{{$o}}][attention_{{$language->id}}]" placeholder="Tour Details" class="input-attention" id="input-attention{{$language->id}}-{{$o}}" cols="40" rows="20" style="display: none;">{{$value['attention_'.$language->id]}}</textarea>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</td>	
									<td>
										<div class="content">
											<button type="button" onclick="$('.attention_row_{{$o}}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
										</div>
									</td>
								</tr>
								<script type="text/javascript">
								    $(function () {
										$("#language_attention_{{$o}} a:first").tab('show')
									})
								</script>
								<?php $o++; ?>
								@endforeach
								@else
								@foreach($data->attentions as $value)
								@if($value->serial==$o)
								<tr class ="attention_row_{{$o}}">
									<td class="col-sm-11">
										<ul class="nav nav-tabs" id="language_attention_{{$o}}"> 
											@foreach($languages as $language)
											<li><a href="#attention-{{$o}}{{$language->code}}" data-toggle="tab" aria-expanded="true"><img src="{{URL::asset("public/admin/image/flags/$language->image")}}" title="{{$language->name}}"> {{$language->name}} </a></li>
											@endforeach
										</ul>
									</td>
									<td class="col-sm-1"></td>
								</tr class ="attention_row_{{$o}}">
								<tr class ="attention_row_{{$o}}">
									<td class="col-sm-11">
										<div class="tab-content">
											@foreach($languages as $language)
											@if($data->attentions()->where('languageID',$language->id)->first())
											<div class="tab-pane fade" id="attention-{{$o}}{{$language->code}}">
												<div class="content">
													<div class="form-group required">
														<label class="col-sm-2 control-label" for="input-attention-title{{$language->id}}">Title</label>
														<div class="col-sm-6">
															<input name="attention[{{$o}}][title_{{$language->id}}]" rows="5" placeholder="Title" id="input-attention-title{{$language->id}}" class="form-control" value="{{$data->attentions()->where('languageID',$language->id)->where('serial',$o)->first()->title}}">
														</div>
														<div class="col-lg-2">
															<button type="button" class="btn btn-primary edit" onclick="editAttention($(this));">Edit</button>
														</div>
													</div>
													<div class="form-group required">
														<div class="col-sm-12">
															<textarea name="attention[{{$o}}][attention_{{$language->id}}]" placeholder="Tour Details" class="input-attention" id="input-attention{{$language->id}}-{{$o}}" cols="40" rows="20" style="display: none;">{{$data->attentions()->where('languageID',$language->id)->where('serial',$o)->first()->text}}</textarea>
														</div>
													</div>
												</div>
											</div>
											@else
											<div class="tab-pane fade" id="attention-{{$o}}{{$language->code}}">
												<div class="content">
													<div class="form-group required">
														<label class="col-sm-2 control-label" for="input-attention-title{{$language->id}}">Title</label>
														<div class="col-sm-6">
															<input name="attention[{{$o}}][title_{{$language->id}}]" rows="5" placeholder="Title" id="input-attention-title{{$language->id}}" class="form-control" value="">
														</div>
														<div class="col-lg-2">
															<button type="button" class="btn btn-primary edit" onclick="editAttention($(this));">Edit</button>
														</div>
													</div>
													<div class="form-group required">
														<div class="col-sm-12">
															<textarea name="attention[{{$o}}][attention_{{$language->id}}]" placeholder="Tour Details" class="input-attention" id="input-attention{{$language->id}}-{{$o}}" cols="40" rows="20" style="display: none;"></textarea>
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
										</div>
									</td>	
									<td>
										<div class="content">
											<button type="button" onclick="$('.attention_row_{{$o}}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
										</div>
									</td>
								</tr>
								<script type="text/javascript">
								    $(function () {
										$("#language_attention_{{$o}} a:first").tab('show')
									})
								</script>
								<?php $o++; ?>
								@endif
								@endforeach
								@endif
							</tbody>
							<tfoot>
								<tr>
									<td></td>
									<td>
					            		<button type="button" onclick="addAttention();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Attention"><i class="fa fa-plus-circle"></i></button>
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
		$("#input-information_{{$language->id}}").summernote({height: 300});
	@endforeach
//--></script>
<script type="text/javascript"><!--
var price_row = {{$i}};

function addPrice() {
    html  = '<tr class="price_row_'+ price_row +'">';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][adult_net]" value="" min="0" placeholder="Adult net" class="form-control adult_net" /><input type="hidden" name="price_row" value="'+ price_row +'" </td>';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][adult_percent]" value="" min="0" max="100" placeholder="Adult percent" class="form-control adult_percent" /></td>';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][child_net]" value="" min="0" placeholder="Child net" class="form-control child_net" /></td>';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][child_percent]" value="" min="0" max="100" placeholder="Child percent" class="form-control child_percent" /></td>';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][baby_net]" value="" min="0" placeholder="Baby net" class="form-control baby_net" /></td>';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][baby_percent]" value="" min="0" max="100" placeholder="Baby percent" class="form-control baby_percent" /></td>';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][discount]" value="" min="0" max="100" placeholder="Discount" class="form-control" /></td>';
	html += '  <td class="text-left">';
	html += '<div class="input-group"><span class="input-group-addon">Date_form</span><input type="date" name="price['+ price_row +'][date_form]" rows="1" value="{{date('Y-m-d')}}" placeholder="dd/mm/yyyy" min="{{date('Y-m-d')}}" class="form-control"/></div>';
	html += '<div class="input-group"><span class="input-group-addon">Date_to</span><input type="date" name="price['+ price_row +'][date_to]" rows="1" value="{{date('Y-m-d')}}" placeholder="dd/mm/yyyy" min="{{date('Y-m-d')}}" class="form-control"/></div>';
	html += '  </td>';
	html += '  <td class="text-left" rowspan="2"><button type="button" onclick="$(\'.price_row_'+ price_row +'\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    html += '<tr class="price_row_'+ price_row +'">';
	html += '  <td class="text-left">Adult Gross</td>';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][adult_gross]" value="" min="0" placeholder="Adult gross" class="form-control adult_gross" id="disabledInput" onClick="adultTotal(\'price_row_'+ price_row +'\');" readonly/></td>';
	html += '  <td class="text-left">Child(5-12) Gross</td>';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][child_gross]" value="" min="0" placeholder="Child gross" class="form-control child_gross" id="disabledInput" onClick="childTotal(\'price_row_'+ price_row +'\');" readonly/></td>';
	html += '  <td class="text-left">Child(0-5) Gross</td>';
	html += '  <td class="text-left"><input type="number" name="price['+ price_row +'][baby_gross]" value="" min="0" placeholder="Baby gross" class="form-control baby_gross" id="disabledInput" onClick="babyTotal(\'price_row_'+ price_row +'\');" readonly/></td>';
	html += '  <td></td>';
	html += '  <td></td>';
    html += '</tr>';
	price_row++;
	
	$('#price tbody').append(html);
}
//--></script>
<script type="text/javascript">
	function adultTotal(that){
		var val_net = new Number($('.'+that).find('.adult_net').val());
		var val_percent = new Number($('.'+that).find('.adult_percent').val());
		$total=val_net + val_net * val_percent / 100;
		$('.'+that).find('.adult_gross').val($total);
	}
	function childTotal(that){
		var val_net = new Number($('.'+that).find('.child_net').val());
		var val_percent = new Number($('.'+that).find('.child_percent').val());
		$total=val_net + val_net * val_percent / 100;
		$('.'+that).find('.child_gross').val($total);
	}
	function babyTotal(that){
		var val_net = new Number($('.'+that).find('.baby_net').val());
		var val_percent = new Number($('.'+that).find('.baby_percent').val());
		$total=val_net + val_net * val_percent / 100;
		$('.'+that).find('.baby_gross').val($total);
	}
</script>
<script type="text/javascript">
	var schedule_row = {{$u}};
	function addSchedule(){
    	$('.input-schedule').destroy().hide();
		html = '<tr class ="schedule_row_'+ schedule_row +'">';
		html += '<td class="col-sm-1"></td>';
		html += '<td class="col-sm-10">';
		html += '<ul class="nav nav-tabs" id="language_schedule_' + schedule_row + '"> ';
		@foreach($languages as $language)
		html += '<li><a href="#schedule-' + schedule_row + '{{$language->code}}" data-toggle="tab"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"> {{$language->name}} </a></li>';
		@endforeach 
		html += '</ul>';
		html += '</td>';
		html += '<td class="col-sm-1"></td>';
		html += '</tr>';
		html += '<tr class ="schedule_row_'+ schedule_row +'">';
		html += '<td class="col-sm-1">';
		html += '<div class="content">';
		html += '<select name="schedule[' + schedule_row + '][transporter]" id="input-transporters" class="form-control">';
		@foreach($transporters as $id => $name)
		html += '<option value="{{$id}}">{{$name}}</option>';
		@endforeach
		html += '</select>';
		html += '</div>';
		html += '</td>';
		html += '<td class="col-sm-10">';
		html += '<div class="tab-content">';
		@foreach($languages as $language)
		html += '<div class="tab-pane fade" id="schedule-' + schedule_row + '{{$language->code}}">';
		html += '<div class="content">';
		html += '<div class="form-group required">';
		html += '<label class="col-sm-2 control-label" for="input-schedule-title2">Title</label>';
		html += '<div class="col-sm-6">';
		html += '<input name="schedule[' + schedule_row + '][title_{{$language->id}}]" rows="5" placeholder="Title" id="input-schedule-title{{$language->id}}" class="form-control" value=""/>';
		html += '</div>';
		html += '<div class="col-lg-2">';
		html += '<button type="button" class="btn btn-primary edit" onclick="editSchedule($(this));">Edit</button>';
		html += '</div>';
		html += '</div>';
		html += '<div class="form-group required">';
		html += '<div class="col-sm-12">';
		html += '<textarea name="schedule[' + schedule_row + '][schedule_{{$language->id}}]" placeholder="Tour Details" class="input-schedule" id="input-schedule{{$language->id}}-' + schedule_row + '" cols="40" rows="20" style="display: none;"></textarea>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		@endforeach 
		html += '</div>';
		html += '</td>	';
		html += '</td class="col-sm-1">';
		html += '<td>';
		html += '<div class="content">';
		html += '<button type="button" onclick="$(\'.schedule_row_'+ schedule_row +'\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>';
		html += '</div>';
		html += '</td>';
		html += '</tr>';
		$("#schedule-table tbody").append(html);
	    $(function () {
			$('#language_schedule_' + schedule_row + ' a:first').tab('show')
		})
		schedule_row++;
	}
</script>
<script type="text/javascript">
	var attention_row = {{$o}};
	function addAttention(){
    	$('.input-attention').destroy().hide();
		html = '<tr class ="attention_row_'+ attention_row +'">';
		html += '<td class="col-sm-11">';
		html += '<ul class="nav nav-tabs" id="language_attention_' + attention_row + '"> ';
		@foreach($languages as $language)
		html += '<li><a href="#attention-' + attention_row + '{{$language->code}}" data-toggle="tab"><img src="{{URL::asset('public/admin/image/flags/'.$language->image)}}" title="{{$language->name}}"> {{$language->name}} </a></li>';
		@endforeach 
		html += '</ul>';
		html += '</td>';
		html += '<td class="col-sm-1"></td>';
		html += '</tr>';
		html += '<tr class ="attention_row_'+ attention_row +'">';
		html += '<td class="col-sm-11">';
		html += '<div class="tab-content">';
		@foreach($languages as $language)
		html += '<div class="tab-pane fade" id="attention-' + attention_row + '{{$language->code}}">';
		html += '<div class="content">';
		html += '<div class="form-group required">';
		html += '<label class="col-sm-2 control-label" for="input-attention-title2">Title</label>';
		html += '<div class="col-sm-6">';
		html += '<input name="attention[' + attention_row + '][title_{{$language->id}}]" rows="5" placeholder="Title" id="input-attention-title{{$language->id}}" class="form-control" value=""/>';
		html += '</div>';
		html += '<div class="col-lg-2">';
		html += '<button type="button" class="btn btn-primary edit" onclick="editAttention($(this));">Edit</button>';
		html += '</div>';
		html += '</div>';
		html += '<div class="form-group required">';
		html += '<div class="col-sm-12">';
		html += '<textarea name="attention[' + attention_row + '][attention_{{$language->id}}]" placeholder="Tour Details" class="input-attention" id="input-attention1-' + attention_row + '" cols="40" rows="20" style="display: none;"></textarea>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		@endforeach 
		html += '</div>';
		html += '</td>';
		html += '<td class="col-sm-1">';
		html += '<div class="content">';
		html += '<button type="button" onclick="$(\'.attention_row_'+ attention_row +'\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>';
		html += '</div>';
		html += '</td>';
		html += '</tr>';
		$("#attention-table tbody").append(html);
	    $(function () {
			$('#language_attention_' + attention_row + ' a:first').tab('show')
		})
		attention_row++;
	}
</script>
<script type="text/javascript">
function editSchedule(that) {
    $('.input-schedule').destroy().hide();
	$(that).parent().parent().parent().find('.input-schedule').summernote({ height: 300 });
}
</script>
<script type="text/javascript">
function editAttention(that) {
    $('.input-attention').destroy().hide();
	$(that).parent().parent().parent().find('.input-attention').summernote({ height: 300 });
}
</script>
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
				$url="{{URL::route('tour_category_get')}}";
				$.ajax({
					"url":$url,
					"type":"get",
					"data":{"id":$id},
					"async":true,
					"success":function(data){
						$("#tour-category").append(data);
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
