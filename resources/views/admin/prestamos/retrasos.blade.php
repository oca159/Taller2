@extends('templates.prestamos_layout')

@section('collection_title')
    Retrasos
@endsection

@section('acciones_prestamos') @stop

@section('partials')
    @include('admin.prestamos.partials.modal_retrasos')
    @include('admin.prestamos.partials.modal_entregar')
    @include('admin.prestamos.partials.table_retrasos')    
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript" src="{{ asset('/js/jquery.dataTables.js')  }}"></script>
    @section('default_name')   'multa'        @endsection
    @section('default_token')  ':MULTA_ID'    @endsection
    @section('default_url')    'multas'       @endsection
    @include('admin.prestamos.partials.jscripts')
    @include('admin.prestamos.partials.jscripts_multas')
@endsection