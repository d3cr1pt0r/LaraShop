@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">{{ $panel_title }}</div>
		<div class="panel-body">
		{{ Form::open(array('url' => 'admin/categories/edit/'.$category->id, 'method' => 'post')) }}
		{{ Form::text('name', $category->name, array('class' => 'form-control', 'placeholder' => 'Category name', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		<select name="parent" class="form-control" style="margin-bottom: 10px;">
			<option value="0">-PARENT-</option>
			@foreach($categories as $cat)
				@if($cat->id == $category->parent_id)
					<option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
				@else
					<option value="{{ $cat->id }}">{{ $cat->name }}</option>
				@endif
			@endforeach
		</select>
		<select name="active" class="form-control">
			<option selected disabled>Product active</option>
			@if($category->active)
				<option value="1" selected>Yes</option>
				<option value="0">No</option>
			@else
				<option value="1">Yes</option>
				<option value="0" selected>No</option>
			@endif
		</select>
		{{ Form::submit('Update', array('class' => 'btn btn-success', 'style' => 'margin-top: 10px; width: 100%;')) }}
		{{ Form::close() }}
		</div>
	</div>
@stop