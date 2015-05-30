<table id="example" class="display" cellspacing="0" width="100%">
    <thead class="blue-grey">
    <tr class="white-text">
        <th class="center ">id</th>
        <th class="center ">Código</th>
        <th class="center ">No. Ejemplares</th>
        <th class="center ">Título</th>
        <th class="center ">Autor</th>
        <th class="center ">Idioma</th>
        <th class="center ">No. Páginas</th>
        @if( Auth::user()->tipo == 'encargado' )
            <th class="center">Agregar</th>
        @endif
    </tr>
    </thead>
    <tfoot class="blue-grey">
    <tr class="white-text">
        <th class="center ">id</th>
        <th class="center ">Código</th>
        <th class="center ">No. Ejemplares</th>
        <th class="center ">Título</th>
        <th class="center ">Autor</th>
        <th class="center ">Idioma</th>
        <th class="center ">No. Páginas</th>
        @if( Auth::user()->tipo == 'encargado' )
            <th class="center">Agregar</th>
        @endif
    </tr>
    </tfoot>
    <tbody>
    @foreach($books as $book)
        <tr id="{{ $book->id  }}" class="libro">
            <td class="center">{{ $book->id }}</td>
            <td class="center">{{ $book->codigo }}</td>
            <td class="center">{{ $book->no_ejemplares }}</td>
            <td class="center">{{ $book->titulo  }}</td>
            <td class="center">{{ $book->autor  }}</td>
            <td class="center">{{ $book->idioma }}</td>
            <td class="center">{{ $book->no_paginas }}</td>
            @if( Auth::user()->tipo == 'encargado' )
                @if( $book->disponibles > 0 )
                    <td class="center"><a id="agregar" data-id="{{ $book->codigo  }}" href="#!" class="btn-floating tooltipped green" data-position="top" data-delay="5" data-tooltip="Agregar"><i class="large mdi-action-add-shopping-cart"></i></a></td>
                @else
                    <td class="center"><a href="#!" class="btn-floating tooltipped disabled" data-position="top" data-delay="5" data-tooltip="No disponibles"><i class="large mdi-navigation-close"></i></a></td>
                @endif
            @endif
        </tr>
    @endforeach
</table>