@extends('catalog.common.catalog')
@section('content')
<div class="mainSliderContainer">
		<ul id="mainSlider" class="rslides rslides1">
			<li id="rslides1_s0" class="first" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; -webkit-transition: opacity 500ms ease-in-out; transition: opacity 500ms ease-in-out;">
				<img src="{{URL::asset('public/catalog/contents/main-slider-1.png')}}" alt="">
				<p class="caption">WHERE TO GO THIS SUMMER?</p>
			</li>
			<li id="rslides1_s1" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; -webkit-transition: opacity 500ms ease-in-out; transition: opacity 500ms ease-in-out;" class="">
				<img src="{{URL::asset('public/catalog/contents/main-slider-2.png')}}" alt="">
				<p class="caption">TRAVEL AROUND THE WORLD FROM $2360.00</p>
			</li>
			<li id="rslides1_s2" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; -webkit-transition: opacity 500ms ease-in-out; transition: opacity 500ms ease-in-out;" class="rslides1_on">
				<img src="{{URL::asset('public/catalog/contents/main-slider-1.png')}}" alt="">
			</li>
			<li id="rslides1_s3" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; -webkit-transition: opacity 500ms ease-in-out; transition: opacity 500ms ease-in-out;" class="last">
				<img src="{{URL::asset('public/catalog/contents/main-slider-2.png')}}" alt="">
			</li>
		</ul><!-- /mainSlider -->
		<div class="mainSliderNav"><a href="#" class="rslides_nav rslides1_nav prev">Previous</a><a href="#" class="rslides_nav rslides1_nav next">Next</a></div>
		
		<!-- BOOKING TABS and FORMS ================================================== -->
		<div class="bookingTabsContainer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-7 col-sm-9 col-xs-12 bookingTabsCol">
						<div id="bookingTabs">
						  <!-- Nav tabs -->
						  <ul class="resp-tabs-list clearfix" role="tablist">
						    <li role="presentation" class="active flights resp-tab-item first"><a href="#flights" aria-controls="flights" role="tab" data-toggle="tab"><span>FLIGHTS</a></span></li>
						    <li class="hotels resp-tab-item " role="presentation"><a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab"><span>HOTELS</span></a></li>
						    <li class="cars resp-tab-item" role="presentation"><a href="#cars" aria-controls="cars" role="tab" data-toggle="tab"><span>CARS</span></a></li>
						    <li class="cruise resp-tab-item" role="presentation"><a href="#cruise" aria-controls="cruise" role="tab" data-toggle="tab"><span>CRUISE</span></a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content resp-tabs-container">
						    <div role="tabpanel" class="tab-pane fade in active resp-tab-content" id="flights">
								<form id="flightBooking" class="generalForm bookingForm" action="#" method="post" novalidate="novalidate">
									<div class="row">
										<div class="col-sm-7">
											<label>Leaving From <span>*</span></label>
											<input type="text" name="leaving_from" class="required">
										</div>
										<div class="col-sm-5 datePickContainer">
											<label>Departing on <span>*</span></label>
											<input type="text" name="departing_on" class="required datePick hasDatepick">
											<img class="datePickImg" alt="date picker" src="{{URL::asset('public/catalog/images/calendar.png')}}">
										</div>
										<div class="col-sm-7">
											<label>Going to <span>*</span></label>
											<input type="text" name="going_to" class="required">
										</div>
										<div class="col-sm-5">
											<label>Arriving on <span>*</span></label>
											<input type="text" name="arriving_on" class="required datePick hasDatepick">
											<img class="datePickImg" alt="date picker" src="{{URL::asset('public/catalog/images/calendar.png')}}">
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-4 pRel">
													<label>Adults <span>*</span></label>
													<select name="adults" class="customSelectInput required hasCustomSelect" style="-webkit-appearance: menulist-button; width: 82px; position: absolute; opacity: 0; height: 31px; font-size: 13px;">
														<option value="00">00</option>
														<option value="01">01</option>
														<option value="02">02</option>
														<option value="03">03</option>
														<option value="04">04</option>
														<option value="05">05</option>
													</select><span class="customSelect customSelectInput required" style="display: inline-block;"><span class="customSelectInner" style="width: 62px; display: inline-block;">00</span></span>
												</div>
												<div class="col-sm-4 pRel">
													<label>Children <span>*</span></label>
													<select name="children" class="customSelectInput required hasCustomSelect" style="-webkit-appearance: menulist-button; width: 82px; position: absolute; opacity: 0; height: 31px; font-size: 13px;">
														<option value="00">00</option>
														<option value="01">01</option>
														<option value="02">02</option>
														<option value="03">03</option>
														<option value="04">04</option>
														<option value="05">05</option>
													</select><span class="customSelect customSelectInput required" style="display: inline-block;"><span class="customSelectInner" style="width: 62px; display: inline-block;">00</span></span>
												</div>
												<div class="col-sm-4 pRel">
													<label>Senior <span>*</span></label>
													<select name="senior" class="customSelectInput required hasCustomSelect" style="-webkit-appearance: menulist-button; width: 82px; position: absolute; opacity: 0; height: 31px; font-size: 13px;">
														<option value="00">00</option>
														<option value="01">01</option>
														<option value="02">02</option>
														<option value="03">03</option>
														<option value="04">04</option>
														<option value="05">05</option>
													</select><span class="customSelect customSelectInput required" style="display: inline-block;"><span class="customSelectInner" style="width: 62px; display: inline-block;">00</span></span>
												</div>
											</div>
										</div>
										<div class="col-sm-5">
											<input type="submit" name="submit" value="SEARCH">
										</div>
									</div>
								</form>
						    </div>
						    <div role="tabpanel" class="resp-tab-content tab-pane fade" id="hotels">
						    		{!!Form::open(array('route'=>array('hotel',Lang::get('language.locale')),'id'=>'hotelBooking', 'class'=>'generalForm bookingForm', 'novalidate'=>'novalidate', 'method'=>'get'))!!}
									<div class="row">
										<div class="col-sm-12">
											<label>{{Lang::get('search_hotel.lable_search')}}</label>
											<input type="text" name="hotel" class="required">
										</div>
										<div class="col-sm-5"  id="check_in">
											<label>{{Lang::get('search_hotel.lable_check_in')}}</label>
											<input type="text" name="check_in" value="{{date('D M d Y')}}" readonly="readonly" data-date-format="ddd MMM DD YYYY">
											<span class="add-on">
												<img class="datePickImg" alt="date picker" src="{{URL::asset('public/catalog/images/calendar.png')}}">
											</span>
										</div>
										<div class="col-sm-2" id="night">
											<label>{{Lang::get('search_hotel.lable_night')}}</label>
											<select name="night" class="">
												@for($i=1;$i<=30;$i++)
													<option value="{{$i}}">{{$i}}</option>
												@endfor
											</select>
										</div>
										<div class="col-sm-5"  id="check_out">
											<label>{{Lang::get('search_hotel.lable_check_out')}}</label>
											<input type="text" name="check_out" value="" readonly="readonly" data-date-format="ddd MMM DD YYYY">
											<span class="add-on">
												<img class="datePickImg" alt="date picker" src="{{URL::asset('public/catalog/images/calendar.png')}}">
											</span>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-4 pRel">
													<label>Adults <span>*</span></label>
													<select name="night" class="">
														@for($i=1;$i<=20;$i++)
															<option value="{{$i}}">{{$i}}</option>
														@endfor
													</select>
												</div>
												<div class="col-sm-4 pRel">
													<label>Childrens <span>*</span></label>
													<select name="children" class="">
														@for($i=1;$i<=20;$i++)
															<option value="{{$i}}">{{$i}}</option>
														@endfor
													</select>
												</div>
												<div class="col-sm-4 pRel">
													<label>Room <span>*</span></label>
													<select name="room" class="">
														@for($i=1;$i<=10;$i++)
															<option value="{{$i}}">{{$i}}</option>
														@endfor
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-5">
											<input type="submit">
										</div>
									</div>
								{!!Form::close()!!}
							</div>
						    <div role="tabpanel" class="resp-tab-content tab-pane fade" id="cars">
						    	<form id="carsBooking" class="generalForm bookingForm" action="#" method="post" novalidate="novalidate">
									<div class="row">
										<div class="col-sm-7">
											<label>Leaving From <span>*</span></label>
											<input type="text" name="leaving_from" class="required">
										</div>
										<div class="col-sm-5 datePickContainer">
											<label>Departing on <span>*</span></label>
											<input type="text" name="departing_on" class="required datePick hasDatepick">
											<img class="datePickImg" alt="date picker" src="{{URL::asset('public/catalog/images/calendar.png')}}">
										</div>
										<div class="col-sm-7">
											<label>Going to <span>*</span></label>
											<input type="text" name="going_to" class="required">
										</div>
										<div class="col-sm-5">
											<label>Arriving on <span>*</span></label>
											<input type="text" name="arriving_on" class="required datePick hasDatepick">
											<img class="datePickImg" alt="date picker" src="{{URL::asset('public/catalog/images/calendar.png')}}">
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-4 pRel">
													<label>Adults <span>*</span></label>
													<select name="adults" class="customSelectInput required hasCustomSelect" style="-webkit-appearance: menulist-button; width: 100px; position: absolute; opacity: 0; height: 0px; font-size: 13px;">
														<option value="00">00</option>
														<option value="01">01</option>
														<option value="02">02</option>
														<option value="03">03</option>
														<option value="04">04</option>
														<option value="05">05</option>
													</select><span class="customSelect customSelectInput required" style="display: inline-block;"><span class="customSelectInner" style="width: 90px; display: inline-block;">00</span></span>
												</div>
												<div class="col-sm-4 pRel">
													<label>Children <span>*</span></label>
													<select name="children" class="customSelectInput required hasCustomSelect" style="-webkit-appearance: menulist-button; width: 100px; position: absolute; opacity: 0; height: 0px; font-size: 13px;">
														<option value="00">00</option>
														<option value="01">01</option>
														<option value="02">02</option>
														<option value="03">03</option>
														<option value="04">04</option>
														<option value="05">05</option>
													</select><span class="customSelect customSelectInput required" style="display: inline-block;"><span class="customSelectInner" style="width: 90px; display: inline-block;">00</span></span>
												</div>
												<div class="col-sm-4 pRel">
													<label>Senior <span>*</span></label>
													<select name="senior" class="customSelectInput required hasCustomSelect" style="-webkit-appearance: menulist-button; width: 100px; position: absolute; opacity: 0; height: 0px; font-size: 13px;">
														<option value="00">00</option>
														<option value="01">01</option>
														<option value="02">02</option>
														<option value="03">03</option>
														<option value="04">04</option>
														<option value="05">05</option>
													</select><span class="customSelect customSelectInput required" style="display: inline-block;"><span class="customSelectInner" style="width: 90px; display: inline-block;">00</span></span>
												</div>
											</div>
										</div>
										<div class="col-sm-5">
											<input type="submit" name="submit" value="SEARCH">
										</div>
									</div>
								</form>
							</div>
						    <div role="tabpanel" class="resp-tab-content tab-pane fade" id="cruise">
						    	<form id="cruiseBooking" class="generalForm bookingForm" action="#" method="post" novalidate="novalidate">
									<div class="row">
										<div class="col-sm-7">
											<label>Leaving From <span>*</span></label>
											<input type="text" name="leaving_from" class="required">
										</div>
										<div class="col-sm-5 datePickContainer">
											<label>Departing on <span>*</span></label>
											<input type="text" name="departing_on" class="required datePick hasDatepick">
											<img class="datePickImg" alt="date picker" src="{{URL::asset('public/catalog/images/calendar.png')}}">
										</div>
										<div class="col-sm-7">
											<label>Going to <span>*</span></label>
											<input type="text" name="going_to" class="required">
										</div>
										<div class="col-sm-5">
											<label>Arriving on <span>*</span></label>
											<input type="text" name="arriving_on" class="required datePick hasDatepick">
											<img class="datePickImg" alt="date picker" src="{{URL::asset('public/catalog/images/calendar.png')}}">
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-4 pRel">
													<label>Adults <span>*</span></label>
													<select name="adults" class="customSelectInput required hasCustomSelect" style="-webkit-appearance: menulist-button; width: 100px; position: absolute; opacity: 0; height: 0px; font-size: 13px;">
														<option value="00">00</option>
														<option value="01">01</option>
														<option value="02">02</option>
														<option value="03">03</option>
														<option value="04">04</option>
														<option value="05">05</option>
													</select><span class="customSelect customSelectInput required" style="display: inline-block;"><span class="customSelectInner" style="width: 90px; display: inline-block;">00</span></span>
												</div>
												<div class="col-sm-4 pRel">
													<label>Children <span>*</span></label>
													<select name="children" class="customSelectInput required hasCustomSelect" style="-webkit-appearance: menulist-button; width: 100px; position: absolute; opacity: 0; height: 0px; font-size: 13px;">
														<option value="00">00</option>
														<option value="01">01</option>
														<option value="02">02</option>
														<option value="03">03</option>
														<option value="04">04</option>
														<option value="05">05</option>
													</select><span class="customSelect customSelectInput required" style="display: inline-block;"><span class="customSelectInner" style="width: 90px; display: inline-block;">00</span></span>
												</div>
												<div class="col-sm-4 pRel">
													<label>Senior <span>*</span></label>
													<select name="senior" class="customSelectInput required hasCustomSelect" style="-webkit-appearance: menulist-button; width: 100px; position: absolute; opacity: 0; height: 0px; font-size: 13px;">
														<option value="00">00</option>
														<option value="01">01</option>
														<option value="02">02</option>
														<option value="03">03</option>
														<option value="04">04</option>
														<option value="05">05</option>
													</select><span class="customSelect customSelectInput required" style="display: inline-block;"><span class="customSelectInner" style="width: 90px; display: inline-block;">00</span></span>
												</div>
											</div>
										</div>
										<div class="col-sm-5">
											<input type="submit" name="submit" value="SEARCH">
										</div>
									</div>
								</form>
						    </div>
						  </div>

						</div>

					</div><!-- /col -->
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /bookingTabsContainer -->
		
		<!-- SHORT OFFERS ================================================== -->
		<div class="shortOffers">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<a href="#" title="" class="shortOffer clearfix">
							<div class="title"><h5>MEXICO</h5><h5>NORTH AMERICA</h5></div>
							<div class="price"><span>From</span><em>$350</em></div>
						</a><!-- /shortOffer -->
					</div><!-- /col -->
					<div class="col-sm-3">
						<a href="#" title="" class="shortOffer clearfix">
							<div class="title"><h5>HA LONG BAY</h5><h5>VIETNAM</h5></div>
							<div class="price"><span>From</span><em>$250</em></div>
						</a><!-- /shortOffer -->
					</div><!-- /col -->
					<div class="col-sm-3">
						<a href="#" title="" class="shortOffer clearfix">
							<div class="title"><h5>PATTAYA</h5><h5>THAILAND</h5></div>
							<div class="price"><span>From</span><em>$600</em></div>
						</a><!-- /shortOffer -->
					</div><!-- /col -->
					<div class="col-sm-3">
						<a href="#" title="" class="shortOffer clearfix">
							<div class="title"><h5>BASTIA BEACH</h5><h5>FRANCE</h5></div>
							<div class="price"><span>From</span><em>$450</em></div>
						</a><!-- /shortOffer -->
					</div><!-- /col -->
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /shortOffers -->
		
	</div>
	<div class="container">
		
		<!-- SPECIAL OFFERS ================================================== -->
		<div class="row">
			<div class="innerTitle"><h2>SPECIAL <span>OFFER</span></h2></div>		
			<div id="specialOffers" class="offers owl-carousel owl-theme" style="opacity: 1; display: block;">
				<div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 4680px; left: -780px; display: block;"><div class="owl-item" style="width: 390px;"><a href="#" class="item">
					<img src="{{URL::asset('public/catalog/contents/sp-offer-1.png')}}" alt="special offer">
					<span>KERAMA ISLANDS</span>
					<div class="priceTag"><em>Fr</em> $350</div>
				</a></div><div class="owl-item" style="width: 390px;"><a href="#" class="item">
					<img src="{{URL::asset('public/catalog/contents/sp-offer-2.png')}}" alt="special offer">
					<span>MAE SURIN WATERFALL</span>
					<div class="priceTag"><em>Fr</em> $350</div>
				</a></div><div class="owl-item" style="width: 390px;"><a href="#" class="item">
					<img src="{{URL::asset('public/catalog/contents/sp-offer-3.png')}}" alt="special offer">
					<span>ABERYSTWYTH BEACH</span>
					<div class="priceTag"><em>Fr</em> $350</div>
				</a></div><div class="owl-item" style="width: 390px;"><a href="#" class="item">
					<img src="{{URL::asset('public/catalog/contents/sp-offer-1.png')}}" alt="special offer">
					<span>KERAMA ISLANDS</span>
					<div class="priceTag"><em>Fr</em> $350</div>
				</a></div><div class="owl-item" style="width: 390px;"><a href="#" class="item">
					<img src="{{URL::asset('public/catalog/contents/sp-offer-2.png')}}" alt="special offer">
					<span>MAE SURIN WATERFALL</span>
					<div class="priceTag"><em>Fr</em> $350</div>
				</a></div><div class="owl-item" style="width: 390px;"><a href="#" class="item">
					<img src="{{URL::asset('public/catalog/contents/sp-offer-3.png')}}" alt="special offer">
					<span>ABERYSTWYTH BEACH</span>
					<div class="priceTag"><em>Fr</em> $350</div>
				</a></div></div></div>
				
				
				
				
				
			<div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev">prev</div><div class="owl-next">next</div></div></div></div><!-- /specialOffers -->
		</div><!-- /row -->
		
		
		<div class="row">
			<div class="col-sm-8">
				<!-- FEATURED OFFERS ================================================== -->
				<div class="row">
					<div class="innerTitle"><h2>FEATURED <span>OFFER</span></h2></div>	
					<div class="featuredOffers offers">
						<div class="col-sm-4">
							<a href="#" class="item">
								<img src="{{URL::asset('public/catalog/contents/ft-offer-1.png')}}" alt="special offer">
								<span>MALAWI NATIONAL PARK</span>
								<div class="priceTag"><em>Fr</em> $350</div>
							</a>
						</div><!-- /col -->
						<div class="col-sm-4">
							<a href="#" class="item">
								<img src="{{URL::asset('public/catalog/contents/ft-offer-2.png')}}" alt="special offer">
								<span>MALAWI NATIONAL PARK</span>
								<div class="priceTag"><em>Fr</em> $350</div>
							</a>
						</div><!-- /col -->
						<div class="col-sm-4">
							<a href="#" class="item">
								<img src="{{URL::asset('public/catalog/contents/ft-offer-3.png')}}" alt="special offer">
								<span>MALAWI NATIONAL PARK</span>
								<div class="priceTag"><em>Fr</em> $350</div>
							</a>
						</div><!-- /col -->
						<div class="col-sm-4">
							<a href="#" class="item">
								<img src="{{URL::asset('public/catalog/contents/ft-offer-4.png')}}" alt="special offer">
								<span>MALAWI NATIONAL PARK</span>
								<div class="priceTag"><em>Fr</em> $350</div>
							</a>
						</div><!-- /col -->
						<div class="col-sm-4">
							<a href="#" class="item">
								<img src="{{URL::asset('public/catalog/contents/ft-offer-5.png')}}" alt="special offer">
								<span>MALAWI NATIONAL PARK</span>
								<div class="priceTag"><em>Fr</em> $350</div>
							</a>
						</div><!-- /col -->
						<div class="col-sm-4">
							<a href="#" class="item">
								<img src="{{URL::asset('public/catalog/contents/ft-offer-6.png')}}" alt="special offer">
								<span>MALAWI NATIONAL PARK</span>
								<div class="priceTag"><em>Fr</em> $350</div>
							</a>
						</div><!-- /col -->
					</div><!-- /featuredOffers -->
				</div><!-- /row -->
			</div><!-- /col -->
			<div class="col-sm-4">
				<!-- LATEST NEWS ================================================== -->
				<div class="innerTitle"><h2>LATEST <span>NEWS</span></h2></div>
				<p class="black">Lorem ipsum dolor ipsum dolor.</p>
				<div class="newsList">
					<ul>
						<li class="first"><a href="#" title="">Lorem ipsum dolor ipsum dolor. Lorem ipsum dolor ipsum dolor. Lorem ipsum dolor ipsum dolor.</a></li>
						<li><a href="#" title="">Lorem ipsum dolor ipsum dolor.</a></li>
						<li class="last"><a href="#" title="">Lorem ipsum dolor ipsum dolor. Lorem ipsum dolor ipsum dolor. Lorem ipsum dolor ipsum dolor.</a></li>
					</ul>
				</div><!-- /newsList -->
				<!-- BOTTOM SLIDER ================================================== -->
				<div class="bottomSliderContainer">
					<ul id="bottomSlider" class="rslides rslides2">
						<li id="rslides2_s0" class="first" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; -webkit-transition: opacity 500ms ease-in-out; transition: opacity 500ms ease-in-out;">
							<img src="{{URL::asset('public/catalog/contents/bottom-slider-1.png')}}" alt="">
							<p class="caption">VISIT TO JAPEN IN THIS SUMMER</p>
						</li>
						<li id="rslides2_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; -webkit-transition: opacity 500ms ease-in-out; transition: opacity 500ms ease-in-out;" class="last rslides2_on">
							<img src="{{URL::asset('public/catalog/contents/bottom-slider-1.png')}}" alt="">
							<p class="caption">VISIT TO JAPEN IN THIS SUMMER</p>
						</li>
					</ul><!-- /bottomSlider -->
					<div class="bottomSliderNav"><a href="#" class="rslides_nav rslides2_nav prev">Previous</a><a href="#" class="rslides_nav rslides2_nav next">Next</a></div>
				</div><!-- /bottomSliderContainer -->
			</div><!-- /col -->
		</div><!-- /row -->
		
	</div>
@stop
@section('script')
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