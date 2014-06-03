<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $title }}</title>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div class="navbar-header">
				{{ HTML::link('/', 'Login Tutorial', array('class' => 'navbar-brand')) }}
			</div>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::user())
					<li>{{ HTML::link('user/logout', 'Logout') }}</li>
				@else
					<li>{{ HTML::link('user/login', 'Login') }}</li>
				@endif
			</ul>
		</div>
	</nav>
	<div class="container">
		@include('plugins.alerts')
		@yield('content')
	</div>
</body>
</html>