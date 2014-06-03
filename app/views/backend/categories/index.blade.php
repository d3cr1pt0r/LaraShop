@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">{{ $panel_title }}</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<th>Name</th>
					<th style="text-align:right;">Action</th>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{ str_repeat('&nbsp;', $category["level"]*2).$category["category"] }}</td>
							<td align="right">{{ HTML::link('#!', 'Edit', array('class' => 'btn btn-primary btn-xs', 'role' => 'button')) }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop