<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Biblioteca Online</title>
		
        <link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.css') }}" rel="stylesheet"/>
		<link href="{{ asset('/css/materialize.css') }}" rel="stylesheet">
		@yield('estilos')
	</head>
	<body>
		<ul id="dropdown_menu" class="dropdown-content center">
			<li class="grey-text">Sesión</li>
			<li class="divider"></li>
			<li><a href="{{ url('/auth/logout') }}">Cerrar sesion</a></li>
		</ul>
		<nav>
			<div class="nav-wrapper blue-grey">
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<a href="{{url('home')}}"><i class="mdi-action-home left"></i>Inicio</a>
				<ul class="right hide-on-med-and-down">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Iniciar sesion</a></li>
						<li><a href="{{ url('/catalogo') }}">Catalogo de libros</a></li>
					@else
						@if( Auth::user()->tipo == 'administrador' )
	                        <li><a href="{{ url('/admin/usuarios') }}"><i class="mdi-action-account-child left"></i>Usuarios</a></li>
	                        <li><a href="{{ url('/admin/cuentas') }}"><i class="mdi-social-mood left"></i>Cuentas</a></li>
						@endif
	                        <li><a href="{{ url('/admin/libros') }}"><i class="mdi-av-my-library-books left"></i>Libros</a></li>
	                        <li><a href="{{ url('/admin/prestamos') }}"><i class="mdi-editor-attach-money left"></i>Prestamos</a></li>
							<li><a class="dropdown-button" href="#" data-activates="dropdown_menu">Opciones<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
					@endif
				</ul>
				<ul class="side-nav" id="mobile-demo">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Iniciar sesion</a></li>
						<li><a href="{{ url('/catalogo') }}">Catalogo de libros</a></li>
					@else
						@if( Auth::user()->tipo == 'administrador' )
	                        <li><a href="{{ url('/admin/usuarios') }}"><i class="mdi-action-account-child left"></i>Usuarios</a></li>
	                        <li><a href="{{ url('/admin/cuentas') }}"><i class="mdi-social-mood left"></i>Cuentas</a></li>
                        @endif
                        <li><a href="{{ url('/admin/libros') }}"><i class="mdi-av-my-library-books left"></i>Libros</a></li>
                        <li><a href="{{ url('/admin/prestamos') }}"><i class="mdi-editor-attach-money left"></i>Prestamos</a></li>
						<li><a class="dropdown-button" href="#" data-activates="dropdown_menu">Opciones<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
					@endif
				</ul>
			</div>
		</nav>

		<br>
		@section('collection_container_head')
		<div class="container">
		    <div class="row">
		@show

		@section('collection_container_body')
		        <ul class="collection with-header">
		            <li class="collection-header center-align"><h5>@yield('collection_title')</h5></li>
		            <li class="collection-item">
		                @if(Session::has('message'))
		                <p class="red-text">{{ Session::get('message')  }}</p>
		                @endif
		                <div class="horizontal-action-menu right row">
							@section('acciones_prestamos')
								@if (Auth::user()->tipo == 'administrador' )
									<div class="col s12">
				                        <a id="ver" href="#modal1" class="modal-trigger btn-floating tooltipped disabled" data-position="top" data-delay="5" data-tooltip="Ver"><i class="large mdi-action-search"></i></a>
									</div>
								@else
				                    <div class="col s4">
				                        <a id="entregar" href="#" class="btn-floating tooltipped disabled" data-position="top" data-delay="5" data-tooltip="Entregar"><i class="large mdi-action-done"></i></a>
									</div>
									<div class="col s4">
				                        <a id="extender" href="#" class="btn-floating tooltipped disabled" data-position="top" data-delay="5" data-tooltip="Extender"><i class="large mdi-device-add-alarm"></i></a>
									</div>
				                    <div class="col s4">
				                        <a id="ver" href="#modal1" class="modal-trigger btn-floating tooltipped disabled" data-position="top" data-delay="5" data-tooltip="Ver"><i class="large mdi-action-search"></i></a>
									</div>
								@endif
							@show
							@section('acciones_multas')
								@if (Auth::user()->tipo == 'administrador' )
									<div class="col s12">
				                        <a id="ver" href="#modal1" class="modal-trigger btn-floating tooltipped disabled" data-position="top" data-delay="5" data-tooltip="Ver"><i class="large mdi-action-search"></i></a>
									</div>
								@else
									<div class="col s6">
				                        <a id="entregar" href="#" class="btn-floating tooltipped disabled" data-position="top" data-delay="5" data-tooltip="Entregar"><i class="large mdi-action-done"></i></a>
									</div>
				                    <div class="col s6">
				                        <a id="ver" href="#modal1" class="modal-trigger btn-floating tooltipped disabled" data-position="top" data-delay="5" data-tooltip="Ver"><i class="large mdi-action-search"></i></a>
									</div>
								@endif
							@show
		                </div>

		                @yield('partials')
		            </li>
		        </ul>
		@show
		@section('collection_container_foot')
		    </div>
		</div>
		@show
		
		@yield('content')
		
		<!-- Scripts -->
		<script src="{{ asset('/js/jquery.js') }}"></script>
		<script src="{{ asset('/js/materialize.js') }}"></script>
		<script>
			$(document).ready(function() {
				$(".button-collapse").sideNav();
				$(".dropdown-button").dropdown({
					hover:false,
					belowOrigin: true
				});
				$('select').material_select();
			});
		</script>
		@yield('scripts')
	</body>
</html>