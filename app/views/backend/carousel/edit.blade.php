@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">{{ $panel_title }}</div>
		<div class="panel-body">
			{{ Form::open(array('url' => 'admin/carousel/edit/'.$carousel->id, 'method' => 'post', 'files' => true)) }}
				<div class="form-group">
					<label>Carousel name</label>
					<input type="text" class="form-control" name="name" value="{{ $carousel->name }}" required>
				</div>
				<div class="form-group">
					<label>Carousel active</label>
					<select name="active" class="form-control" style="margin-bottom: 10px;">
						@if($carousel->active)
							<option value="1" selected>Yes</option>
							<option value="0">No</option>
						@else
							<option value="1">Yes</option>
							<option value="0" selected>No</option>
						@endif
					</select>
				</div>
				<div class="form-group">
					<label>Carousel images</label>
					<button type="button" id="iu_add" class="btn btn-primary" style="width: 100%;">Add images</button>
					<input type="file" id="iu_dialog" name="files[]" multiple style="display: none;">
					<table class="table table-condensed" id="iu_files">
						<thead>
							<th>#</th>
							<th>Filename</th>
							<th>Size</th>
						</thead>
						<tbody>

						</tbody>
					</table>
					<table class="table table-condensed">
						<thead>
							<th>Image</th>
							<th>Status</th>
							<th style="text-align:right;">Action</th>
						</thead>
						<tbody>
							@foreach($carousel->images as $image)
								<tr>
									<td>
										<img src="{{ asset('libs/slir/w100/'.$image->src) }}"/>
									</td>
									@if($image->active == 1)
										<td><a href="{{ url('admin/carousel/toggleactiveimage/'.$image->id) }}"><span class="label label-success">Active</span></a></td>
									@else
										<td><a href="{{ url('admin/carousel/toggleactiveimage/'.$image->id) }}"><span class="label label-danger">Inactive</span></a></td>
									@endif
									<td align="right">{{ HTML::link('admin/carousel/deleteimage/'.$image->id, 'Delete', array('class' => 'btn btn-danger btn-xs', 'role' => 'button')) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ Form::submit('Update', array('class' => 'btn btn-success', 'style' => 'margin-top: 10px; width: 100%;')) }}
			{{ Form::close() }}
		</div>
	</div>

	<script>
		//Image upload script
		$("#iu_files").hide();
		$("#iu_add").click(function()
		{
			$("#iu_dialog").trigger("click");
		});

		$('#iu_dialog').change(function () {
			$("#iu_files tbody").html("");
			var files = this.files;
			for(var i=0;i<files.length;i++)
			{
				var filename = files[i].name;
				var filesize = Math.round(files[i].size / 1024);

				console.log(filesize);
				$("#iu_files tbody").append("<tr><td>"+(i+1)+"</td><td>"+filename+"</td><td>"+filesize+"kb</td></tr>");
			}
			$("#iu_files").slideDown();
		});

	</script>

@stop