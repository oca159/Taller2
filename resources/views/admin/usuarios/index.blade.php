@extends('templates.layout')

@section('collection_title')
    Usuarios
@endsection

@section('url_create')
    "{{url('/admin/usuarios/create')}}"
@endsection

@section('partials')
    @include('admin.usuarios.partials.modal')
    @include('admin.usuarios.partials.table')
    {!! Form::open([ 'route' => ['admin.usuarios.destroy', ':USUARIO_ID'], 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'form-delete' ]) !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript" src="{{ asset('/js/jquery.dataTables.js')  }}"></script>
    @section('default_name')   'usuario'        @endsection
    @section('default_token')  ':USUARIO_ID'    @endsection
    @section('default_url')    'usuarios'       @endsection
    @include('admin.partials.jscripts');
    @include('admin.usuarios.partials.jscripts')
@endsection