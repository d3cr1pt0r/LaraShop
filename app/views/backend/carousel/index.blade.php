@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			{{ $panel_title }}
			{{ HTML::link('admin/carousel/add', 'Add', array('class' => 'btn btn-default btn-xs pull-right', 'role' => 'button')) }}
		</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<th>Name</th>
					<th>Active</th>
					<th style="text-align:right;">Action</th>
				</thead>
				<tbody>
					@foreach($carousels as $carousel)
						<tr>
							<td>{{ $carousel->name }}</td>
							@if($carousel->active == 1)
								<td><a href="{{ url('admin/carousel/toggleactive/'.$carousel->id) }}"><span class="label label-success">Active</span></a></td>
							@else
								<td><a href="{{ url('admin/carousel/toggleactive/'.$carousel->id) }}"><span class="label label-danger">Inactive</span></a></td>
							@endif
							<td align="right">
								<a href="{{ url('admin/carousel/moveup/'.$carousel->id) }}"><span class="glyphicon glyphicon-circle-arrow-up" style="color: #3A3A3A;"></span></a>
								<a href="{{ url('admin/carousel/movedown/'.$carousel->id) }}"><span class="glyphicon glyphicon-circle-arrow-down" style="color: #3A3A3A;"></span></a>
								{{ HTML::link('admin/carousel/delete/'.$carousel->id, 'Delete', array('class' => 'btn btn-danger btn-xs', 'role' => 'button')) }}
								{{ HTML::link('admin/carousel/edit/'.$carousel->id, 'Edit', array('class' => 'btn btn-primary btn-xs', 'role' => 'button')) }}
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