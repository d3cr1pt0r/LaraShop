@extends('layouts.master')

@section('content')
	<h2>This is the index page</h2>
	@if(Auth::user() != null)
		@if(Auth::user()->type == 'admin')
			<p>Welcome <string>admin</strong></p>
		@elseif(Auth::user()->type == 'member')
			<p>Welcome <string>member</strong></p>
		@endif
	@else
		<p>Welcome <string>guest</strong></p>
	@endif
@stop