@extends('templates.layout')

@if( Auth::user()->tipo == 'encargado' )

    @section('collection_container_head')

        <div class="row">
            <div class="col s12 m10 l10 left">
                    <div class="row">

    @stop

    @section('collection_container_body') @parent
        
    @stop

    @section('collection_container_foot')
            </div>
        </div>
    @stop

    @section('content')
        <div class="col s12 m2 l2">
            <ul class="collection with-header">
                <li class="collection-item center blue-grey white-text">
                    <h6>Carrito</h6>
                </li>
                <li class="collection-item">
                    <ul id="carrito"></ul>
                </li>
                <li class="collection-item" id="li_prestar"><a id="prestar" href="#" class="collection-item btn center green white-text waves-effect waves-light">Prestar</a></li>
            </ul>
        </div>
    </div>
    @endsection
@endif

@section('collection_title')
    Libros
    @include('admin.partials.messages')
@endsection

@section('url_create')
    "{{url('/admin/libros/create')}}"
@endsection

@section('partials')
    @include('admin.libros.partials.modal')
    @include('admin.libros.partials.table')
    {!! Form::open([ 'route' => ['admin.libros.destroy', ':BOOK_ID'], 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'form-delete' ]) !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript" src="{{ asset('/js/jquery.dataTables.js')  }}"></script>
    @section('default_name')   'libro'     @endsection
    @section('default_token')  ':BOOK_ID'  @endsection
    @section('default_url')    'libros'    @endsection
    @include('admin.partials.jscripts');
    @include('admin.libros.partials.jscripts')
@endsection