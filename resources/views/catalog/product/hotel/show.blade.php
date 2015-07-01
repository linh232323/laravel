@extends('catalog.common.catalog')
@section('content')
<div class="container">
    <ul class="breadcrumb">
    </ul>
    <div class="content">
        <div class="row">
            <div id="content" class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-xs-12">
                        <div class="control-group">
                            <div class = "header-box-hightlight">
                                <strong><i class="glyphicon glyphicon-search text-primary"></i> {{Lang::get('search_hotel.title')}}</strong>
                            </div>
                            <div class = "content-box-hightlight">
                                <table>
                                    <tr>
                                        <td width="30px"><i class="glyphicon glyphicon-home text-primary"></i></td><td>{{substr($hotel->name,0,18)}}"..."</td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-calendar text-primary"></i></td><td>{{Lang::get('search_hotel.lable_check_in')}} </td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-calendar text-primary"></i></td><td>{{Lang::get('search_hotel.lable_check_out')}} </td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-user text-primary"></i><i class="glyphicon glyphicon-user text-warning"></i></td><td>{{Lang::get('search_hotel.lable_guest')}} </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br/>
                        <div class="control-group">
                            <form method="POST" action="">
                                <div class="header-box-hightlight">
                                    <h4 class="title"><strong> {{Lang::get('search_hotel.title')}}</strong></h4>
                                </div>
                                <div class="content-box-hightlight">
                                    <div id="form-search" class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="control-label" for="input-search">{{Lang::get('search_hotel.lable_search')}}</label>
                                                <input type="text" name="search" value="" placeholder="" id="input-search" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 date" id="check_in">
                                                <label class="control-label" for="input-option">{{Lang::get('search_hotel.lable_check_in')}}</label>
                                                <div class=" input-group">
                                                    <input type="text" name="check_in" value= "" readonly="readonly" data-date-format="ddd MMM DD YYYY" class="form-control input_check_in"/>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button" id="date"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-5" id="night">
                                                <label class="control-label" for="input-option">{{Lang::get('search_hotel.lable_night')}}</label>
                                                <div class="">
                                    			{!!Form::select('night',$select_night,Input::old(),array('class'=>'form-control'))!!}
                                                </div>
                                            </div>
                                            <div class="col-xs-7 date1" id="check_out">
                                                <label class="control-label" for="input-option">{{Lang::get('search_hotel.lable_check_out')}}</label>
                                                <div class="input-group">
                                                    <input type="text" name="check_out" value="" data-date-format="ddd MMM DD YYYY" readonly="readonly" class="form-control input_check_out" />
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button" id="date"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 form-group" id="guest">
                                                <label class="control-label" for="input-option217">{{Lang::get('search_hotel.lable_guest')}}</label>
                                                <select name="guestsl" id = "adults" class="form-control">
                                                    <option value="1">{{Lang::get('search_hotel.lable_guest_1_adult')}}</option>
                                                    <option value="2">{{Lang::get('search_hotel.lable_guest_2_adults')}}</option>
                                                    <option value="" >{{Lang::get('search_hotel.lable_guest_adult_more')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" id="hide">
                                            <div class="col-xs-12 form-group">
                                                <span class="col-xs-3">
                                                    <label class="control-label">{{Lang::get('search_hotel.lable_room')}}</label>
                                                    <select name="room" class="form-control ">
                                                        @for ($i=1;$i<=10;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </span>
                                                <span class="col-xs-3">
                                                    <label class="control-label">{{Lang::get('search_hotel.lable_adults')}}</label>
                                                    <select name="adults"class="form-control ">
                                                        @for ($i=1;$i<=22;$i++)
                                                        <option value="{{$i}}"> {{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </span>
                                                <span class="col-xs-5">
                                                    <label class="control-label">{{Lang::get('search_hotel.lable_children')}}</label>
                                                    <select name="children"class="form-control ">
                                                        @for ($i=0;$i<=4;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button type="submit"id="button-search" class="btn btn-primary btn-block" ><strong>{{Lang::get('search_hotel.button_search')}}</strong></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xs-12">
                        <div class="row">
                            <h1 class="col-lg-8 col-xs-12">
                                {{$hotel->descriptions()->where('languageID',Lang::get('language.id'))->first()->name}}
                                <span class="rating">
                                   	@for ($i = 1; $i <= 5; $i++)
                                    @if ($hotel->star < $i)
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    @else
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    @endif
                                    @endfor
                                </span>
                            </h1>
                            <h1 class ="col-lg-4 pull-right text-right text-primary">
                                
                            </h1>

                        </div>
                        <div class="pull-right text-primary text-right">
                            <div class="row">
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-lg-8"><em>{{$hotel->descriptions()->where('languageID',Lang::get('language.id'))->first()->address}}<a onclick="toggleContent()"> <strong>(Show on Map)</strong></a></em></p>
                        </div>
                        <div class ='row thumb'>
                            @if ($hotel->images()->get())
                            <div id="sync1" class="owl-carousel">
                                @foreach ($hotel->images()->get() as $image)
                                <div class="item"><img src="{{URL::asset('public/'.$image->image)}}"/></div>
                                @endforeach
                            </div>
                            <div id="sync2" class="owl-carousel">
                                @foreach ($hotel->images()->get() as $image)
                                <div class="item"><img src="{{URL::asset('public/'.$image->image)}}"/></div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @if (isset($rooms))
                        <div class="row">
			                <div class="row">
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
                        </div>
                        <div class="row"> 
                            <div class="room-layout room-list col-lg-12" id="room-layout">
                                <table class="table table-bordered table-striped table-header">
                                    <th class = "col-lg-5 col-xs-5 text-center">{{Lang::get('search_hotel.text_rooms')}}</th>
                                    <th class = "col-lg-2 col-xs-2 text-center">{{Lang::get('search_hotel.text_max_adults')}}</th>
                                    <th class = "col-lg-2 col-xs-2 text-center">{{Lang::get('search_hotel.text_rate')}}</th>
                                    <th class = "col-lg-3 col-xs-3"></th>
                                </table>
                                @foreach($rooms as $room)
                                <div class="room-thumb">
                                    <table  class="table table-bordered table-hover">
                                        <tr>
                                            <td class="col-lg-5 col-xs-5">
                                                <strong><a href="{{URL::route('room_show',array('locale'=>Lang::get('language.locale'),'id'=>$room->id,'title'=>$room->descriptions()->where('languageID',Lang::get('language.id'))->first()->name))}}" data-toggle="modal" data-target="#myModal" class="modal_room">{{$room->descriptions()->where('languageID',Lang::get('language.id'))->first()->name}}</a></strong>
                                                <img src="{{URL::asset('public/'.$room->image)}}" alt="{{$room->descriptions()->where('languageID',Lang::get('language.id'))->first()->name}}" title="{{$room->descriptions()->where('languageID',Lang::get('language.id'))->first()->name}}" class="img-responsive">
                                                <p><a href="{{URL::route('room_show',array('locale'=>Lang::get('language.locale'),'id'=>$room->id,'title'=>$room->descriptions()->where('languageID',Lang::get('language.id'))->first()->name))}}" class="modal_room">{{Lang::get('search_hotel.text_info')}}</a></p>
                                            </td>
                                            <td class="col-lg-2 col-xs-2 text-center control-label">
                                                @if($room->maxadults==1)
                                                <i class="glyphicon glyphicon-user"></i> 
                                                @elseif($room->maxadults==2)
                                                <span data-toggle="tooltip" title="" data-original-title="{{Lang::get('search_hotel.text_max_adults')}} : {{$room->maxadults}}"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-user"></i></span>
                                                @else
                                                <span data-toggle="tooltip" title="" data-original-title="{{Lang::get('search_hotel.text_max_adults')}} : {{$room->maxadults}}"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-plus"></i> </span>
                                                @endif
                                            </td>
                                            <td class = "col-lg-2 col-xs-2 text-center">
                                                <strong class="text-primary">
                                                	{{$room->price}}
                                                </strong>
                                            </td>
                                            <td class="col-lg-3 col-xs-3">
                                                <div class="center-block">
                                                    <a href="<?php echo $room['href'];?>"><button type="button" class="btn btn-primary btn-block btn-blue center-block"><i class="fa fa-shopping-cart"></i> <strong>{{Lang::get('search_hotel.button_book')}}</strong></button></a>
                                                </div>
                                                <p class = "text-center" >
                                                   	@if($room->quantity==1)
                                                    <strong class="text-danger">{{Lang::get('search_hotel.text_our_last_room')}}</strong>
                                                    @elseif($room->quantity<=5)
                                                    <strong class="text-warning">{{Lang::get('search_hotel.text_our_last')}} {{$room->quantity}} {{Lang::get('search_hotel.text_rooms')}} </strong>
                                                    @else
                                                    <strong class="text-success">{{Lang::get('search_hotel.text_available')}}</strong>
                                                    @endif
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-6 text-right">{{$rooms->render()}}</div>
                        </div>
                        {!!$hotel->descriptions()->where('languageID',Lang::get('language.id'))->first()->description!!}
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-short-description" data-toggle="tab">{{Lang::get('search_hotel.tab_short_description')}}</a></li>
                            @if($attribute_groups)
                            <li><a href="#tab-specification" data-toggle="tab">{{Lang::get('search_hotel.tab_attributes')}}</a></li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab-short-description">{!!$hotel->descriptions()->where('languageID',Lang::get('language.id'))->first()->short_description!!}</div>
                            @if($attribute_groups)
                            <div class="tab-pane" id="tab-specification">
                                <div class = "header-box-hightlight">
                                    <strong>{{Lang::get('search_hotel.text_features')}} {{$hotel->descriptions()->where('languageID',Lang::get('language.id'))->first()->name}}</strong>
                                </div>
                                <div class = "content-box-hightlight">
                                    <table class="table">
                                        <tbody>
                                            @foreach($attribute_groups as $attributes_group)
                                            <tr>
                                                <td><strong>{{$attributes_group['group_name']}}</strong></td>
                                                <td class="pull-left col-sm-12">
                                                	@foreach($attributes_group['name'] as $attribute)
                                                	<div class="col-md-4">
                                                		<strong><i class = "glyphicon glyphicon-ok text-success" ></i></strong> {{$attribute}}
                                                	</div>
                                                	@endforeach
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

    </div>
  </div>
</div>
@stop
@section('script')
<script type="text/javascript">
    $('.modal_room').on('click',function(e){
        e.preventDefault();
        $('.modal-content').load($(this).attr('href'));
    })
</script>
<script type="text/javascript">
            $(document).ready(function () {

    var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            sync1.owlCarousel({
            singleItem: true,
                    slideSpeed: 1000,
                    navigation: true,
                    pagination: false,
                    afterAction: syncPosition,
                    responsiveRefreshRate: 200,
            });
            sync2.owlCarousel({
            items: 7,
                    itemsDesktop: [1199, 10],
                    itemsDesktopSmall: [979, 10],
                    itemsTablet: [768, 8],
                    itemsMobile: [479, 4],
                    pagination: false,
                    responsiveRefreshRate: 100,
                    afterInit: function (el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                    }
            });
            function syncPosition(el) {
            var current = this.currentItem;
                    $("#sync2")
                    .find(".owl-item")
                    .removeClass("synced")
                    .eq(current)
                    .addClass("synced")
                    if ($("#sync2").data("owlCarousel") !== undefined) {
            center(current)
            }
            }

    $("#sync2").on("click", ".owl-item", function (e) {
    e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo", number);
    });
            function center(number) {
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                    var num = number;
                    var found = false;
                    for (var i in sync2visible) {
            if (num === sync2visible[i]) {
            var found = true;
            }
            }

            if (found === false) {
            if (num > sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", num - sync2visible.length + 2)
            } else {
            if (num - 1 === - 1) {
            num = 0;
            }
            sync2.trigger("owl.goTo", num);
            }
            } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", sync2visible[1])
            } else if (num === sync2visible[0]) {
            sync2.trigger("owl.goTo", num - 1)
            }

            }

    });</script>
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