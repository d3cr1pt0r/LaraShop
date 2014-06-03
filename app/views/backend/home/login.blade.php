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
	<div class="container">
		@include('backend.plugins.alerts')
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="well" style="margin-top: 50px; text-align: center;">
					<legend>LaraShop - Login</legend>
					{{ Form::open(array('url' => 'admin/login', 'method' => 'post')) }}
					{{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
					{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
					{{ Form::submit('Login', array('class' => 'btn btn-success', 'style' => 'width: 100%;')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</body>
</html>