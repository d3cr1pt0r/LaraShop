@extends('backend.layouts.master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">{{ $panel_title }}</div>
		<div class="panel-body">
			{{ Form::open(array('url' => 'admin/products/add', 'method' => 'post', 'files' => true)) }}
				<div class="form-group">
					<label>Product name</label>
					<input type="text" class="form-control" name="name" required>
				</div>
				<div class="form-group">
					<label>Product description</label>
					<textarea class="ckeditor" name="description"></textarea>
				</div>
				<div class="form-group">
					<label>Product price</label>
					<input type="text" class="form-control" name="price" required>
				</div>
				<div class="form-group">
					<label>Product code</label>
					<input type="text" class="form-control" name="code" required>
				</div>
				<div class="form-group">
					<label>Product stock</label>
					<input type="text" class="form-control" name="stock" required>
				</div>
				<div class="form-group">
					<label>Product active</label>
					<select name="active" class="form-control" style="margin-bottom: 10px;">
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</div>
				<div class="form-group">
					<label>Product category</label>
					<select name="category" class="form-control">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>

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

				{{ Form::submit('Add', array('class' => 'btn btn-success', 'style' => 'margin-top: 10px; width: 100%;')) }}
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