@extends('templates.layout')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('/css/jquery-ui.css') }}">
@stop

@section('collection_container_body')
    <ul class="collection with-header">
        <li class="collection-header center-align"><h5>Registrar prestamo</h5></li>
        <li class="collection-item">
            <div class="row">
                @include('admin.partials.messages')
                {!! Form::open([ 'route' => 'admin.prestamos.store', 'method' => 'POST', 'class' => 'validate' ]) !!}
                <ul class="collection with-header">
                    <li class="collection-header center"><h5>Resumen de los libros</h5></li>
                    @foreach ($libros as $key => $libro)
                        <input type="text" class="collection-item" name="{{ $libro[0]->codigo }}" id="{{ $libro[0]->id }}" value="{{ $libro[0]->codigo }} - {{ $libro[0]->titulo }}" readonly></input>
                    @endforeach

                </ul>
                @include('admin.prestamos.partials.fields')
                <div class="input-field col s12  center-align">
                    <button type="submit" class="btn">Prestar</button>
                    <button type="button" class="btn red" onclick="window.location.href  = ' {{ url('/admin/libros') }} ' ">Cancelar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </li>
    </ul>
@stop
@include('variables')
@section('scripts')
  <script src="{{ asset('/js/jquery-ui.js') }}"></script>
  @include('admin.prestamos.partials.jscripts_create')
@stop