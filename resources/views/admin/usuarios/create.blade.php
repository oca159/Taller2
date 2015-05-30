@extends('templates.layout')

@section('collection_container_body') 
    <ul class="collection with-header">
        <li class="collection-header center-align"><h5>Nuevo usuario</h5></li>
        <li class="collection-item">
            <div class="row">
                @include('admin.partials.messages')
                {!! Form::open([ 'route' => 'admin.usuarios.store', 'method' => 'POST', 'class' => 'validate' ]) !!}
                @include('admin.usuarios.partials.fields')
                    <div class="input-field col s12  center-align">
                        <button type="submit" class="btn">Crear usuario</button>
                        <button type="button" class="btn red" onclick="window.location.href  = ' {{ url('/admin/usuarios') }} ' ">Cancelar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </li>
    </ul>
@stop
@include('variables')
@section('scripts')
    <script src="{{ asset('/js/jquery.numeric.min.js') }}"></script>
    @include('admin.usuarios.partials.jscripts')
@endsection