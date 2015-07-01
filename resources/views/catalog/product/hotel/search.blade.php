@extends('catalog.common.catalog')
@section('content')

<div class="container">
    <ul class="breadcrumb">

    </ul>
    <div class="row">
        <div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3  col-md-3 col-sm-3 col-xs-12">
                <div class="panel-wrapper">
                    <div class="box box-title">
                        <h4 class="title"><strong>{{Lang::get('search_hotel.title')}}</strong></h4>
                    </div>
                    <div id="form-search"  class="box box-content form-group">
                        <form method="POST" action="index.php?route=product/search">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label" for="input-search">{{Lang::get('search_hotel.lable_search')}}</label>
                                    <input type="text" name="search" value="" placeholder="" id="input-search" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 date">
                                    <label class="control-label" for="input-option">{{Lang::get('search_hotel.lable_check_in')}}</label>
                                    <div class=" input-group" id="check_in">
                                    	{!!Form::text('check_in',Input::old('check_in'),array("data-date-format"=>"ddd MMM DD YYYY", "readonly"=>"readonly", "class"=>"form-control input_check_out"))!!}
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="date"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" id="night">
                                    <label class="control-label" for="input-option">{{Lang::get('search_hotel.lable_night')}}</label>
                                    <div class="" id="night">
                                    	{!!Form::select('night',$select_night,Input::old(),array('class'=>'form-control'))!!}
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 date1">
                                    <label class="control-label" for="input-option">{{Lang::get('search_hotel.lable_check_out')}}</label>
                                    <div class="input-group" id="check_out">
                                    	{!!Form::text('check_out',Input::old('check_out'),array("data-date-format"=>"ddd MMM DD YYYY", "readonly"=>"readonly", "class"=>"form-control input_check_out"))!!}
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="date"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 form-group" id="guest">
                                    <label class="control-label" for="input-option217">{{Lang::get('search_hotel.lable_guest')}}</label>
                                    <select name="guestsl" id = "adults" class="form-control">
                                        <option value="1">{{Lang::get('search_hotel.lable_guest_1_adult')}}</option>
                                        <option value="2">{{Lang::get('search_hotel.lable_guest_2_adults')}}</option>
                                        <option value="">{{Lang::get('search_hotel.lable_guest_adult_more')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 form-group" id="hide">
                                    <span class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label">{{Lang::get('search_hotel.lable_room')}}</label>
                                    	{!!Form::select('room',$select_rooms,Input::old('room'),array("class"=>"form-control"))!!}
                                    </span>
                                    <span class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label">{{Lang::get('search_hotel.lable_adults')}}</label>
                                    	{!!Form::select('adults',$select_adults,Input::old('adults'),array("class"=>"form-control"))!!}
                                    </span>
                                    <span class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label">{{Lang::get('search_hotel.lable_childrens')}}</label>
                                    	{!!Form::select('children',$select_children,Input::old('children'),array("class"=>"form-control"))!!}
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="button-search" class="btn btn-primary btn-block" >{{Lang::get('search_hotel.button_search')}}</button>
                                </div>                
                            </div>                
                        </form>
                    </div>
                </div>
            </div>
            <div id="search-result" class="row col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h3 class="row">
                    <div class="col-lg-12">
                        {{Lang::get('search_hotel.text_found')}}<strong class= "text-primary"> {{count($hotels)}} </strong>{{Lang::get('search_hotel.text_hotel_available')}}<strong class= "text-primary"></strong>. <?php if(isset($results))echo $results; ?>
                        <div class="pull-right">
                            <button id="button-maps" class="btn btn-success" onclick="toggleContent()"><i class="glyphicon glyphicon-map-marker"></i>Maps</button>
                        </div>
                        <!-- <div class="search-panel-wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12" id="maps" style="position: absolute;">
                            <span id="map" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 600px; z-index: 1000;"></span>
                        </div> -->
                    </div>
                </h3>
                <div class="row">
                    <div class="col-sm-2 hidden-xs">
                        <div class="btn-group">
                            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="{{Lang::get('default.button_list')}}"><i class="fa fa-th-list"></i></button>
                            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="{{Lang::get('default.button_grid')}}"><i class="fa fa-th"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-3 text-right">
                        <label class="control-label" for="input-sort">{{Lang::get('default.text_sort')}}</label>
                    </div>
                    <div class="col-sm-3 text-right">
                    </div>
                    <div class="col-sm-2 text-right">
                        <label class="control-label" for="input-limit">{{Lang::get('default.text_limit')}}</label>
                    </div>
                    <div class="col-sm-2 text-right">
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($hotels as $hotel) { ?>
                    <div id = "room" class="product-layout room-list col-xs-12">
                        <div class="product-thumb">
                            <div class="image"><a href="{{URL::route('hotel_show',array('locale'=>Lang::get('language.locale'),'id'=>$hotel['id'],'title'=>$hotel['name']))}}"><img src="{{URL::asset('public/'.$hotel['image'])}}" alt="{{$hotel['name']}}" title="{{$hotel['name']}}" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4 class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><a href="{{URL::route('hotel_show',array('locale'=>Lang::get('language.locale'),'id'=>$hotel['id'],'title'=>$hotel['name']))}}">{{$hotel['name']}}</a><span class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                        @if ($hotel['star'] < $i)
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        @else
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        @endif
                                        @endfor
                                    </span></h4>
                                <div class="col-xs-3 pull-right text-right text-primary">
                                    <h4 class="text-primary">
                                    </h4>
                                    <div>
                                    </div>
                                </div>
                                <div class="col-xs-9"><strong>
                                        @if ($hotel['wifi'] == 0)
                                        {{Lang::get('search_hotel.free_wifi')}} <img src="{{URL::asset('public/catalog/images/icon_aniwifi.gif')}}"/>
                                        @else
                                        {{Lang::get('search_hotel.no_wifi')}} <img src="{{URL::asset('public/catalog/images/icon_nowifi.gif')}}"/>
                                        @endif
                                    </strong></div>
                                <div class="pull-bottom-right">
                                    <a href="" ><button type="button" class= "btn btn-primary btn-block "><i class="fa fa-shopping-cart"></i><strong> {{Lang::get('search_hotel.button_book')}} </strong></button></a>
                                </div>
                            </div>
                            <div class= "col-xs-12" >
                                @foreach($hotel['rooms'] as $room)
                                <div class="table table-responsive table-hover table-striped">
                                    <div class="list-group">
                                        <a href="{{URL::route('room_show',array('locale'=>Lang::get('language.locale'),'id'=>$room['id'],'title'=>$room['name']))}}" class="col-xs-12">
                                            <span class="col-lg-2 col-xs-12 text-primary">{{$room['name']}}</span>
                                            <span class="col-lg-4 col-xs-12 text-info"><strong>{!!$room['room_deal']!!}</strong></span>
                                            @if ($room['quantity'] == 1)
                                            <span class="col-lg-3 col-xs-12 text-danger"><strong>{{Lang::get('search_hotel.text_our_last_room')}}</strong></span>
                                            @elseif ($room['quantity'] <= 5)
                                            <span class="col-lg-3 col-xs-12 text-warning"><strong>{{Lang::get('search_hotel.text_our_last')}} {{$room['quantity']}} {{Lang::get('search_hotel.text_rooms')}} </strong></span>
                                            @else
                                            <span class="col-lg-3 col-xs-12 text-success"><strong>{{Lang::get('search_hotel.text_available')}}</strong></span>
                                            @endif
                                            <span class="col-lg-3 col-xs-12 text-right">
                                                <strong> 
                                                    {{$room['price']}}
                                                </strong>
                                            </span>
                                        </a> 
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
    var now = new Date();
    var max = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 29);
    $('#check_in').datetimepicker({
      pickTime: false, minDate: moment()
    });
    $('#check_out').datetimepicker({
      pickTime: false, minDate: moment(), maxDate: max
    });
});
$("#check_in").on("dp.change", function (e) {
var datepick = (e.date);
var date = new Date(datepick);
var outpick = new Date(date.getFullYear(), date.getMonth(), date.getDate());
$('#check_out').data("DateTimePicker").setMinDate(outpick);
var checkin = (e.date);
var datein = new Date(checkin);
var out = new Date(datein.getFullYear(), datein.getMonth(), datein.getDate() + 30);
$('#check_out').data("DateTimePicker").setMaxDate(out);
});
</script>
@stop