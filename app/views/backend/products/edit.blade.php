@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">{{ $panel_title }}</div>
		<div class="panel-body">
			{{ Form::open(array('url' => 'admin/products/edit/'.$product->id, 'method' => 'post')) }}
				<div class="form-group">
					<label>Product name</label>
					<input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
				</div>
				<div class="form-group">
					<label>Product description</label>
					<textarea class="ckeditor" name="description">{{ $product->description }}</textarea>
				</div>
				<div class="form-group">
					<label>Product price</label>
					<input type="text" class="form-control" name="price" value="{{ $product->price }}" required>
				</div>
				<div class="form-group">
					<label>Product code</label>
					<input type="text" class="form-control" name="code" value="{{ $product->code }}" required>
				</div>
				<div class="form-group">
					<label>Product stock</label>
					<input type="text" class="form-control" name="stock" value="{{ $product->stock }}" required>
				</div>
				<div class="form-group">
					<label>Product active</label>
					<select name="active" class="form-control" style="margin-bottom: 10px;">
						@if($product->active)
							<option value="1" selected>Yes</option>
							<option value="0">No</option>
						@else
							<option value="1">Yes</option>
							<option value="0" selected>No</option>
						@endif
					</select>
				</div>
				<div class="form-group">
					<label>Product active</label>
					<select name="category" class="form-control">
						@foreach($categories as $category)
							@if($category->id == $product->category_id)
								<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
							@else
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endif
						@endforeach
					</select>
				</div>
				{{ Form::submit('Add', array('class' => 'btn btn-success', 'style' => 'margin-top: 10px; width: 100%;')) }}
			{{ Form::close() }}
		</div>
	</div>
@stop