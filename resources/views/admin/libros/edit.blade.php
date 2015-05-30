@extends('templates.layout')

@section('collection_container_body') 
    <ul class="collection with-header">
        <li class="collection-header">
            <h6>Editar Libro: {{ $book->titulo  }}</h6>
            <h6 class="red-text">@include('admin.partials.messages')</h6>
        </li>
        <li class="collection-item">
            <div class="row">
                {!! Form::model($book, [ 'route' => ['admin.libros.update', $book], 'method' => 'PUT', 'class' => 'form-horizontal' ]) !!}
                @include('admin.libros.partials.fields')
                <div class="input-field col s12 center-align">
                    <button type="submit" class="btn waves-effect waves-light">Guardar Libro</button>
                    <a href="../" class="btn waves-effect waves-light white black-text">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </li>
    </ul>
@stop

@section('scripts')
    <script src="{{ asset('/js/jquery.numeric.min.js') }}"></script>
    @include('admin.libros.partials.jscripts')
@stop