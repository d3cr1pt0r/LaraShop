@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">{{ $panel_title }}</div>
		<div class="panel-body">
		{{ Form::open(array('url' => 'admin/categories/edit/'.$category->id, 'method' => 'post')) }}
		{{ Form::text('name', $category->name, array('class' => 'form-control', 'placeholder' => 'Category name', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		<select name="parent" class="form-control">
			<option value="0">-PARENT-</option>
			@foreach($categories as $cat)
				@if($cat->id == $category->parent_id)
					<option value="{{ $cat->id }}" selected="selected">{{ $cat->name }}</option>
				@else
					<option value="{{ $cat->id }}">{{ $cat->name }}</option>
				@endif
			@endforeach
		</select>
		{{ Form::submit('Update', array('class' => 'btn btn-default', 'style' => 'margin-top: 10px; width: 100%;')) }}
		{{ Form::close() }}
		</div>
	</div>
@stop