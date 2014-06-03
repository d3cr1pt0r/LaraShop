@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">{{ $panel_title }}</div>
		<div class="panel-body">
		{{ Form::open(array('url' => 'admin/products/add', 'method' => 'post')) }}
		{{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Product name', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		{{ Form::text('description', '', array('class' => 'form-control', 'placeholder' => 'Product description', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		{{ Form::text('price', '', array('class' => 'form-control', 'placeholder' => 'Product price', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		{{ Form::text('code', '', array('class' => 'form-control', 'placeholder' => 'Product code', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		{{ Form::text('stock', '', array('class' => 'form-control', 'placeholder' => 'Product stock', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		<select name="active" class="form-control" style="margin-bottom: 10px;">
			<option selected disabled>Product active</option>
			<option value="1">Yes</option>
			<option value="0">No</option>
		</select>
		<select name="category" class="form-control">
			@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
		{{ Form::submit('Add', array('class' => 'btn btn-default', 'style' => 'margin-top: 10px; width: 100%;')) }}
		{{ Form::close() }}
		</div>
	</div>
@stop