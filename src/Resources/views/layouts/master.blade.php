<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@if(isset($product->title)){{$product->title}}@endif</title>
        <meta name="keywords" content="@if(isset($product->keywords)){{$product->keywords}}@endif">
        <meta name="description" content="@if(isset($product->description)){{$product->description}}@endif">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf_token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="{{URL::asset($user['favicon'])}}">
        <link rel="icon" href="{{URL::asset($user['favicon'])}}">

		<!-- Latest compiled and minified CSS -->
		{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
		<link rel="stylesheet" href="{{URL::asset('assets/bootstrap-3.3.7/css/bootstrap.min.css')}}">

		<link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome-4.6.3/css/font-awesome.min.css')}}">

		<script src="{{URL::asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/libs/jquery-ui.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/libs/angular.min.js')}}"></script>

        <link href="{{URL::asset('modules/site/css/style.css')}}" rel="stylesheet">

        @yield('head')
		@if($google_font !="")
			<link href="{{$google_font}}" rel="stylesheet">
		@endif
		<style>{!!$user_css!!}</style>
		<link href="{{URL::asset("usercss/user-".$user_id.".css")}}" rel="stylesheet">
	<body>
		<!-- Navigation -->
		@include('site::partials.menu')


		@yield('content')

		<!-- /.container -->
		@include('site::partials.footer')
		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{URL::asset('assets/bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/libs/bootstrap-hover-dropdown.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/libs/bootbox.min.js')}}"></script>
		{{--<script src="{{URL::asset('modules/site/js/jquery.bxslider.js')}}"></script>--}}
		{{--<script src="{{URL::asset('modules/site/js/mooz.scripts.min.js')}}"></script>--}}
		@yield('scripts_js')
		@yield('slider')
		@yield('contactform')
	</body>
</html>