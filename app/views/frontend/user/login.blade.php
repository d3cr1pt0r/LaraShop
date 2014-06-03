@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="well">
				<legend>Please sign in</legend>
				{{ Form::open(array('url' => 'user/login', 'method' => 'post')) }}
				{{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
				{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
				{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
				{{ HTML::link('user/register', 'Register', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop