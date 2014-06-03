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
	<nav class="navbar navbar-inverse" role="navigation">
  		<div class="container-fluid">
    		<div class="navbar-header">
				{{ HTML::link('/admin', 'LaraShop', array('class' => 'navbar-brand')) }}
			</div>
			<ul class="nav navbar-nav">
				<li>{{ HTML::link('/admin/categories', 'Categories') }}</li>
				<li><a href="#!">Products</a></li>
				<li><a href="#!">Carousel</a></li>
				<li><a href="#!">Orders</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>{{ HTML::link('admin/logout', 'Logout') }}</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		@include('backend.plugins.alerts')
		@yield('content')
	</div>
</body>
</html>