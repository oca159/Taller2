@extends('templates.layout')

@section('collection_container_head') @parent @stop

@section('collection_container_body') 
    <ul class="collection with-header">
        <li class="collection-header center-align"><h5>Nuevo cliente</h5></li>
        <li class="collection-item">
            <div class="row">
                @include('admin.partials.messages')
                {!! Form::open([ 'route' => 'admin.clientes.store', 'method' => 'POST', 'class' => 'validate' ]) !!}
                @include('admin.clientes.partials.fields')
                    <div class="input-field col s12  center-align">
                        <button type="submit" class="btn">Crear cliente</button>
                        <button type="button" class="btn red" onclick="window.location.href  = ' {{ url('/admin/clientes') }} ' ">Cancelar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </li>
    </ul>
@stop

@section('collection_container_foot') @parent @stop

@section('scripts')
    <script src="{{ asset('/js/jquery.numeric.min.js') }}"></script>
    <script>
        $('#telefono').numeric();
    </script>
@stop