@extends('templates.prestamos_layout')

@section('collection_title')
    Prestamos
@endsection
@section('collection_container_head') @parent @stop

@section('collection_container_body') @parent

    @section('collection_title')
        Prestamos
    @endsection

    @section('acciones_prestamos') @parent @stop
    @section('acciones_multas') @stop

    @section('partials')
        @include('admin.prestamos.partials.modal')
        @include('admin.prestamos.partials.table')
    @endsection
@stop

@section('collection_container_foot') @parent @stop

@section('scripts')
    <script type="text/javascript" language="javascript" src="{{ asset('/js/jquery.dataTables.js')  }}"></script>
    @section('default_name')   'prestamo'        @endsection
    @section('default_token')  ':PRESTAMO_ID'    @endsection
    @section('default_url')    'prestamos'       @endsection
    @include('admin.prestamos.partials.jscripts')
    @include('admin.prestamos.partials.jscripts_prestamos')
@endsection