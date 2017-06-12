@extends('layout.layout')

@section('content')

@if( count($errors) > 0 )
	
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>	

@endif
<form action="{{ route('process') }}" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="command">Command</label>
		<input type="text" name="command" id="command">
	</div>

</form>


@endsection