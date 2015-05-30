@extends('templates.layout')

@section('collection_container_body') 

    <ul class="collection with-header">
        <li class="collection-header center-align"><h5>Nuevo Libro</h5></li>
        <li class="collection-item">
            <div class="row">
                @include('admin.partials.messages')
                {!! Form::open([ 'route' => 'admin.libros.store', 'method' => 'POST', 'class' => 'validate' ]) !!}
                @include('admin.libros.partials.fields')
                    <div class="input-field col s12  center-align">
                        <button type="submit" class="btn">Registrar Libro</button>
                        <button type="button" class="btn red" onclick="window.location.href  = ' {{ url('/admin/libros') }} ' ">Cancelar</button>
                    </div>
                {!! Form::close() !!}

            </div>
        </li>
    </ul>
@stop

@section('scripts')
    <script src="{{ asset('/js/jquery.numeric.min.js') }}"></script>
    @include('admin.libros.partials.jscripts')
@stop