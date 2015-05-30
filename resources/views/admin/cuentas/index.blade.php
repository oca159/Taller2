@extends('templates.layout')

@section('collection_title')
    Cuentas
@endsection

@section('url_create')
    "{{url('/admin/cuentas/create')}}"
@endsection

@section('partials')
    @include('admin.cuentas.partials.modal')
    @include('admin.cuentas.partials.table')
    {!! Form::open([ 'route' => ['admin.cuentas.destroy', ':CUENTA_ID'], 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'form-delete' ]) !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript" src="{{ asset('/js/jquery.dataTables.js')  }}"></script>
    @section('default_name')   'cuenta'        @endsection
    @section('default_token')  ':CUENTA_ID'       @endsection
    @section('default_url')    'cuentas'          @endsection
    @include('admin.partials.jscripts');
    @include('admin.cuentas.partials.jscripts')
@endsection