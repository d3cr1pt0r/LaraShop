@if(Session::has('alert'))
	@if(Session::get('alert')['type'] == 'error')
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Error!</strong><br>
			@foreach(Session::get('alert')['messages'] as $message)
				{{ $message }}
			@endforeach
		</div>
	@elseif(Session::get('alert')['type'] == 'success')
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Success!</strong><br>
			@foreach(Session::get('alert')['messages'] as $message)
				{{ $message }}
			@endforeach
		</div>
	@endif
@endif