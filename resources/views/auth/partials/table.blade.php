<table id="example" class="display" cellspacing="0" width="100%">
    <thead class="blue-grey">
    <tr class="white-text">
        <th class="center ">Código</th>
        <th class="center ">Título</th>
        <th class="center ">Autor</th>
        <th class="center ">Idioma</th>
        <th class="center ">No. Disponibles</th>
    </tr>
    </thead>
    <tfoot class="blue-grey">
    <tr class="white-text">
        <th class="center ">Código</th>
        <th class="center ">Título</th>
        <th class="center ">Autor</th>
        <th class="center ">Idioma</th>
        <th class="center ">No. Disponibles</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($books as $book)
        <tr class="libro" id="{{ $book->id }}">
            <td class="center">{{ $book->codigo }}</td>
            <td class="center">{{ $book->titulo  }}</td>
            <td class="center">{{ $book->autor  }}</td>
            <td class="center">{{ $book->idioma }}</td>
            <td class="center">{{ $book->disponibles }}</td>
        </tr>
    @endforeach
</table>