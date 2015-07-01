<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Genuine tour">
	<title>
		@section('title')
		Genuine tour
		@show
	</title>
	{!!Html::style('public/css/font-awesome/css/font-awesome.css')!!}
	{!!Html::style('public/css/font-awesome/css/font-awesome.min.css')!!}
	{!!Html::style('public/catalog/css/owl.carousel.css')!!}
	{!!Html::style('public/catalog/css/owl.theme.css')!!}
	{!!Html::style('public/css/bootstrap.css')!!}
	{!!Html::style('public/css/bootstrap.css.map')!!}
	{!!Html::style('public/css/bootstrap.min.css')!!}
	{!!Html::style('public/css/bootstrap-theme.css')!!}
	{!!Html::style('public/css/bootstrap-theme.css.map')!!}
	{!!Html::style('public/css/bootstrap-theme.min.css')!!}
	{!!Html::style('public/catalog/css/bootstrap-datetimepicker.min.css')!!}
	{!!Html::style('public/catalog/css/stylesheet.css')!!}
</head>
<body>
	@include('catalog.common.header')
	@include('catalog.common.menu-top')
	@yield('content')
	{!!Html::script('public/js/jquery.js')!!}
	{!!Html::script('public/js/bootstrap.min.js')!!}
	{!!Html::script('public/catalog/js/common.js')!!}
	{!!Html::script('public/catalog/js/owl.carousel.min.js')!!}
	{!!Html::script('public/catalog/js/moment.js')!!}
	{!!Html::script('public/catalog/js/bootstrap-datetimepicker.min.js')!!}
	@yield('script')
	@include('catalog.common.footer')
</body>
</html>