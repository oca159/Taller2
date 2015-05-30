@extends('templates.layout')

@section('collection_title')
    Catalogo de libros
@endsection

@section('partials')
    @include('auth.partials.modal')
    @include('auth.partials.table')
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript" src="{{ asset('/js/jquery.dataTables.js')  }}"></script>
    @include('auth.partials.jscripts')
@endsection