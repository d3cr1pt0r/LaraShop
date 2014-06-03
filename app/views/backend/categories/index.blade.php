@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			{{ $panel_title }}
			{{ HTML::link('admin/categories/add', 'Add', array('class' => 'btn btn-default btn-xs pull-right', 'role' => 'button')) }}
		</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<th>Name</th>
					<th>Active</th>
					<th style="text-align:right;">Action</th>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{ str_repeat('&nbsp;', $category->level*2).$category->name }}</td>
							@if($category->active == 1)
								<td><input type="checkbox" name="active" value="1" checked="checked" onclick="window.location = '{{ url('admin/categories/toggleactive/'.$category->id) }}';"></td>
							@else
								<td><input type="checkbox" name="active" value="1" onclick="window.location = '{{ url('admin/categories/toggleactive/'.$category->id) }}';"></td>
							@endif
							<td align="right">
								<a href="{{ url('admin/categories/moveup/'.$category->id) }}"><span class="glyphicon glyphicon-circle-arrow-up" style="color: #3A3A3A;"></span></a>
								<a href="{{ url('admin/categories/movedown/'.$category->id) }}"><span class="glyphicon glyphicon-circle-arrow-down" style="color: #3A3A3A;"></span></a>
								{{ HTML::link('admin/categories/delete/'.$category->id, 'Delete', array('class' => 'btn btn-danger btn-xs', 'role' => 'button')) }}
								{{ HTML::link('admin/categories/edit/'.$category->id, 'Edit', array('class' => 'btn btn-primary btn-xs', 'role' => 'button')) }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop