@extends('templates.layout')

@section('collection_container_body') 
    <ul class="collection with-header">
        <li class="collection-header center-align"><h5>Nueva Cuenta</h5></li>
        <li class="collection-item">
            <div class="row">
                @include('admin.partials.messages')
                {!! Form::open([ 'route' => 'admin.cuentas.store', 'method' => 'POST', 'class' => 'validate' ]) !!}
                @include('admin.cuentas.partials.fields')
                    <div class="input-field col s12  center-align">
                        <button type="submit" class="btn">Crear cuenta</button>
                        <button type="button" class="btn red" onclick="window.location.href  = ' {{ url('/admin/cuentas') }} ' ">Cancelar</button>
                    </div>
                {!! Form::close() !!}

            </div>
        </li>
    </ul>
@stop

@section('scripts')
    <script src="{{ asset('/js/jquery.numeric.min.js') }}"></script>
    @include('admin.cuentas.partials.jscripts')
@endsection