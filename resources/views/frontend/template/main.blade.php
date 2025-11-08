<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="{{ asset('frontend') }}/css/tiny-slider.css" rel="stylesheet">
	<link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
	@stack('css')
	<title>Malikussaleh Advertising </title>
</head>

<body>

	@include('frontend.template.navbar')

	@yield('content')

	@include('frontend.template.footer')

	<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('frontend') }}/js/tiny-slider.js"></script>
	<script src="{{ asset('frontend') }}/js/custom.js"></script>
	@stack('js')
</body>

</html>
