@extends('templates.layout')

@section('collection_title')
    Usuarios
@endsection

@section('url_create')
    "{{url('/admin/clientes/create')}}"
@endsection

@section('partials')
    @include('admin.clientes.partials.modal')
    @include('admin.clientes.partials.table')
    {!! Form::open([ 'route' => ['admin.clientes.destroy', ':CLIENTE_ID'], 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'form-delete' ]) !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript" src="{{ asset('/js/jquery.dataTables.js')  }}"></script>
    @section('default_name')   'cliente'        @endsection
    @section('default_token')  ':CLIENTE_ID'    @endsection
    @section('default_url')    'clientes'       @endsection
    @include('admin.partials.jscripts');
    @include('admin.clientes.partials.jscripts')
@endsection