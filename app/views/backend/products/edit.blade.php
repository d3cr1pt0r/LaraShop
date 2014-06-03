@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">{{ $panel_title }}</div>
		<div class="panel-body">
		{{ Form::open(array('url' => 'admin/products/edit/'.$product->id, 'method' => 'post')) }}
		{{ Form::text('name', $product->name, array('class' => 'form-control', 'placeholder' => 'Product name', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		{{ Form::text('description', $product->description, array('class' => 'form-control', 'placeholder' => 'Product description', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		{{ Form::text('price', $product->price, array('class' => 'form-control', 'placeholder' => 'Product price', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		{{ Form::text('code', $product->code, array('class' => 'form-control', 'placeholder' => 'Product code', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		{{ Form::text('stock', $product->stock, array('class' => 'form-control', 'placeholder' => 'Product stock', 'required' => 'required', 'style' => 'margin-bottom: 10px')) }}
		<select name="active" class="form-control" style="margin-bottom: 10px;">
			<option selected disabled>Product active</option>
			@if($product->active)
				<option value="1" selected>Yes</option>
				<option value="0">No</option>
			@else
				<option value="1">Yes</option>
				<option value="0" selected>No</option>
			@endif
		</select>
		<select name="category" class="form-control">
			@foreach($categories as $category)
				@if($category->id == $product->category_id)
					<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
				@else
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endif
			@endforeach
		</select>
		{{ Form::submit('Update', array('class' => 'btn btn-default', 'style' => 'margin-top: 10px; width: 100%;')) }}
		{{ Form::close() }}
		</div>
	</div>
@stop