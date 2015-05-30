@extends('templates.layout')

@section('collection_container_body') 
	<div class="col s12 m6 l6">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light center-align">
				<a href="{!! url('/admin/prestamos/lista') !!}" title="index" class="grey-text text-darken-4">
					<i class="large mdi-av-my-library-books"></i>
				</a>
			</div>
			<div class="card-content">
				<span class="card-title activator grey-text text-darken-4">Prestamos <i class="mdi-navigation-more-vert right"></i></span>
				<p><a href="{!! url('/admin/prestamos/lista') !!}">Ver</a></p>
			</div>
			<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Prestamos <i class="mdi-navigation-close right"></i></span>
				<p>En esta sección podrás ver el listado de los prestamos en un comodo DataTable.</p>
				<a href="{!! url('/admin/prestamos/lista') !!}">Ver prestamos</a>
			</div>
		</div>
	</div>
	<div class="col s12 m6 l6">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light center-align">
				<a href="{!! url('/admin/retrasos') !!}" title="index" class="grey-text text-darken-4">
					<i class="large mdi-device-access-alarm"></i>
				</a>
			</div>
			<div class="card-content">
				<span class="card-title activator grey-text text-darken-4">Retrasos y multas <i class="mdi-navigation-more-vert right"></i></span>
				<p><a href="{!! url('/admin/retrasos') !!}">Ver</a></p>
			</div>
			<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Retrasos y multas <i class="mdi-navigation-close right"></i></span>
				<p>En esta sección podrás ver el listado de los retrasos.</p>
				<a href="{!! url('/admin/retrasos') !!}">Ver retrasos</a>
			</div>
		</div>
		
	</div>
@stop