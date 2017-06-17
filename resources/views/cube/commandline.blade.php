@extends('layout.layout')

@section('content')

@if( count($errors) > 0 )
	
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>	

@endif

<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--4-col"></div>
  <div class="mdl-cell mdl-cell--4-col mdl-cell--middle">
  	<div class="mdl-card mdl-shadow--2dp card-complete">
	
		<div class="mdl-card__title">
			<h2 class="mdl-card__title-text">
				Cube Summation
			</h2>
		</div>	
		<div class="mdl-card__supporting-text">
			<form action="{{ route('process') }}" method="post">
				{{ csrf_field() }}
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="sample3">Command</label>
					<input type="text" name="command" class="mdl-textfield__input" id="command">
				</div>

			</form>
		</div>
	
		@if( isset($response) )
			
			<div class="mdl-card__actions mdl-card--border">
				
				@if( isset($lq) )

				<span class="mdl-chip mdl-chip--contact">
				    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">

				    	LC

				    </span>
				    <span class="mdl-chip__text">{{ $lq }}</span>
				</span>

				@endif

			    <span class="mdl-chip mdl-chip--contact">
				    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">

				    	@if( $response == 'creado')
						
						C

						@elseif( $response == 'Actualizado' )

						A

						@else

						R

						@endif

				    </span>
				    <span class="mdl-chip__text">{{ $response }}</span>
				</span>
			</div>	

		@endif

	</div>
  </div>
  <div class="mdl-cell mdl-cell--4-col"></div>
</div>



@endsection