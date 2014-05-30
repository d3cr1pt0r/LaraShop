@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="well">
				<legend>Please sign in</legend>
				{{ Form::open(array('url' => 'user/register', 'method' => 'post')) }}
				{{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
				{{ Form::text('surname', '', array('class' => 'form-control', 'placeholder' => 'Surname', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
				{{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
				{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
				{{ Form::password('password2', array('class' => 'form-control', 'placeholder' => 'Repeat password', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
				{{ Form::select('type', array('admin' => 'Admin', 'member' => 'Member'), 'admin', array('class' => 'form-control', 'style' => 'margin-bottom: 10px')) }}
				{{ Form::submit('Register', array('class' => 'btn btn-success')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop