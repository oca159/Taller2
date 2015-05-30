@extends('templates.layout')

@section('collection_container_head') @parent @stop

@section('collection_container_body') 
    <ul class="collection with-header">
        <li class="collection-header">
            <h6>Editar cliente: {{ $cliente->full_name  }}</h6>
            <h6 class="red-text">@include('admin.partials.messages')</h6>
        </li>
        <li class="collection-item">
            <div class="row">
                {!! Form::model($cliente, [ 'route' => ['admin.clientes.update', $cliente], 'method' => 'PUT', 'class' => 'form-horizontal' ]) !!}
                @include('admin.clientes.partials.fields')
                <div class="input-field col s12 center-align">
                    <button type="submit" class="btn waves-effect waves-light">Actualizar cliente</button>
                    <a href="../" class="btn waves-effect waves-light white black-text">Cancelar</a>
                    {!! Form::close() !!}
                    @include('admin.clientes.partials.delete')
                </div>
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