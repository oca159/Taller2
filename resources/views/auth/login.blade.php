@extends('templates.layout')

@section('collection_container_body') 
		<ul class="collection with-header">
			<li class="collection-header center-align"><h5>Iniciar sesion</h5></li>
			<li class="collection-item">
				@if (count($errors) > 0)
				<div class="center-align red-text">
					Por favor corrige los siguientes errores.<br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
					<div class="row">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="input-field col s12 center-align">
							<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
							<label for="email">{{ trans('validation.attributes.email') }}</label>
						</div>
						<div class="input-field col s12">
							{!! Form::password('password', array('class' => 'validate', 'id' => 'password') ) !!}
							<label for="password">{{ trans('validation.attributes.password')  }}</label>
						</div>
						<div class="input-field col s12 center-align">
							<div class="valing-wrapper">
								<button type="submit" class="btn valign">Entrar</button>
								<input type="checkbox" id="test5" class="valign" />
		    					<label for="test5" class="valign">{!! Form::checkbox('remember', null) !!} Recordarme</label>
							</div>
						</div>
						<div class="input-field col s12 center-align">
							<a class="waves-effect waves-teal btn-flat" href="{{ url('/password/email') }}">¿Olvidate tu contraseña?</a>
						</div>
						<div class="input-field col s12 center-align">
							
	    				</div>
					</div>
				</form>
			</li>
		</ul>
@stop