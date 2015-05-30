@extends('templates.layout')

@section('collection_container_body') 
    <ul class="collection with-header">
        <li class="collection-header">
            <h6>Editar cuenta: {{ $cuenta->full_name  }}</h6>
            <h6 class="red-text">@include('admin.partials.messages')</h6>
        </li>
        <li class="collection-item">
            <div class="row">
                {!! Form::model($cuenta, [ 'route' => ['admin.cuentas.update', $cuenta], 'method' => 'PUT', 'class' => 'form-horizontal' ]) !!}
                @include('admin.cuentas.partials.fields')
                <div class="input-field col s12 center-align">
                    <button type="submit" class="btn waves-effect waves-light">Actualizar cuenta</button>
                    <a href="../" class="btn waves-effect waves-light white black-text">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </li>
    </ul>
@stop

@section('scripts')
    <script src="{{ asset('/js/jquery.numeric.min.js') }}"></script>
    @include('admin.cuentas.partials.jscripts')
@stop