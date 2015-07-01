<header>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="dropdownMenus clearfix">
						<div class="dropdown language">
						  <a class="dropTrigger" id="dLabelLang" data-toggle="dropdown" href="#"><img alt="language-{{Lang::get('language.code')}}" src="{{URL::asset('public/admin/image/flags/'.Lang::get('language.image'))}}"><span>{{Lang::get('language.code')}}</span></a>
						  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabelLang">
						  	@foreach($languages as $language)
							<li>
								<a class="clearfix" href="{{URL::route(Route::currentRouteName(),$language->code)}}" title="{{$language->code}}"><img alt="{{$language->code}}" src="{{URL::asset('public/admin/image/flags/'.$language->image)}}"><span>{{$language->code}}</span></a>
							</li>
							@endforeach
						  </ul>
						</div><!-- /language -->
						<div class="dropdown currency">
						  <a class="dropTrigger" id="dLabelCur" data-toggle="dropdown" href="#">USD</a>
						  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabelCur">
							<li class="first"><a class="clearfix" href="#" title="US">USD</a></li>
							<li><a class="clearfix" href="#" title="VNĐ">VNĐ</a></li>
							<li><a class="clearfix" href="#" title="STERLIN">STERLIN</a></li>
							<li class="last"><a class="clearfix" href="#" title="YEN">YEN</a></li>
						  </ul>
						</div><!-- /currency -->
					</div><!-- /clearfix -->
					<div class="callUsTop">
						<h4>CALL US TODAY</h4>
						<span>Lorem ipsum dolor sit saelas: <a href="tel:84868868888" title="(84) - 868 868 888">(84) - 868 868 888</a></span>
					</div><!-- /callUsTop -->
				</div><!-- /col -->
				
				<div class="col-sm-8">
					<div class="col-sm-8">
						<div id="logo"><a href="#" title="Travel Booking"><img src="{{URL::asset('public/admin/image/logo.png')}}" alt="Travel Booking"></a></div>
						<div class="topmenu clearfix">
							<ul class="l_tinynav1">
								<li class="first"><a href="#" title="About Us">About Us</a></li>
								<li><a href="#" title="News">News</a></li>
								<li><a href="#" title="Service">Service</a></li>
								<li><a href="#" title="Recruiment">Recruiment</a></li>
								<li><a href="#" title="Media">Media</a></li>
								<li class="last"><a href="#" title="Support">Support</a></li>
							</ul><select class="tinynav tinynav1"><option value="#">About Us</option><option value="#">News</option><option value="#">Service</option><option value="#">Recruiment</option><option value="#">Media</option><option value="#" selected="selected">Support</option></select>
						</div><!-- /topmenu -->
					</div><!-- /col -->
					<div class="col-sm-4 clearfix">
						<div class="fRight pRev">
							<div class="topRightLinks clearfix">
								<a class="login" href="#">Login</a>
								<a class="register" href="#">Register</a>
							</div>
							<div class="social clearfix">
								<ul>
									<li class="first"><a class="rss" href="#">RSS</a></li>
									<li><a class="twitter" href="#">Twitter</a></li>
									<li class="last"><a class="facebook" href="#">Facebook</a></li>
								</ul>
							</div><!-- /topSocial -->
							<form id="topSearch" class="clearfix" action="#" method="post">
								<input type="text" name="keyword">
								<input type="submit" name="submit">
							</form><!-- /topSearch -->
						</div><!-- /fRight -->
					</div><!-- /col -->
				</div><!-- /col -->
			</div><!-- /row -->
		</div><!-- /container -->
	</header>