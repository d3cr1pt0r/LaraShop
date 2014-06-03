@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			{{ $panel_title }}
			{{ HTML::link('admin/products/add', 'Add', array('class' => 'btn btn-default btn-xs pull-right', 'role' => 'button')) }}
		</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<th>Name</th>
					<th>Category</th>
					<th>Code</th>
					<th>Stock</th>
					<th>Active</th>
					<th style="text-align:right;">Action</th>
				</thead>
				<tbody>
					@foreach($products as $product)
						<tr>
							<td>{{ $product->name }}</td>
							<td>{{ $product->category_id }}</td>
							<td>{{ $product->code }}</td>
							<td>{{ $product->stock }}</td>
							@if($product->active == 1)
								<td><input type="checkbox" name="active" value="1" checked="checked" onclick="window.location = '{{ url('admin/products/toggleactive/'.$product->id) }}';"></td>
							@else
								<td><input type="checkbox" name="active" value="1" onclick="window.location = '{{ url('admin/products/toggleactive/'.$product->id) }}';"></td>
							@endif
							<td align="right">
								<a href="{{ url('admin/products/moveup/'.$product->id) }}"><span class="glyphicon glyphicon-circle-arrow-up" style="color: #3A3A3A;"></span></a>
								<a href="{{ url('admin/products/movedown/'.$product->id) }}"><span class="glyphicon glyphicon-circle-arrow-down" style="color: #3A3A3A;"></span></a>
								{{ HTML::link('admin/products/delete/'.$product->id, 'Delete', array('class' => 'btn btn-danger btn-xs', 'role' => 'button')) }}
								{{ HTML::link('admin/products/edit/'.$product->id, 'Edit', array('class' => 'btn btn-primary btn-xs', 'role' => 'button')) }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<script>

	</script>
@stop