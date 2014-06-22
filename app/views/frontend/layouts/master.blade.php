<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $title }}</title>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/style.css'); }}
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}
</head>
<body>
	@include('frontend.header')
	@yield('content')
	@include('frontend.footer')
</body>
</html>