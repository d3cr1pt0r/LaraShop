@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">{{ $panel_title }}</div>
		<div class="panel-body">
		{{ Form::open(array('url' => 'admin/categories/add', 'method' => 'post')) }}
		{{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Category name', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		<select name="parent" class="form-control" style="margin-bottom: 10px;">
			<option value="0">-PARENT-</option>
			@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
		<select name="active" class="form-control">
			<option selected disabled>Product active</option>
			<option value="1">Yes</option>
			<option value="0">No</option>
		</select>
		{{ Form::submit('Add', array('class' => 'btn btn-default', 'style' => 'margin-top: 10px; width: 100%;')) }}
		{{ Form::close() }}
		</div>
	</div>
@stop