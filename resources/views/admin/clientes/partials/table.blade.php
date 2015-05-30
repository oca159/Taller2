<table id="example" class="display" cellspacing="0" width="100%">
    <thead class="blue-grey">
    <tr class="white-text">
        <th class="center" class="center">#</th>
        <th class="center" class="center">Nombre</th>
        <th class="center" class="center">Email</th>
        <th class="center" class="center">Teléfono</th>
    </tr>
    </thead>
    <tfoot class="blue-grey">
    <tr class="white-text">
        <th class="center" class="center">#</th>
        <th class="center" class="center">Nombre</th>
        <th class="center" class="center">Email</th>
        <th class="center" class="center">Teléfono</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($clientes as $cliente)
        <tr id="{{ $cliente->id  }}" class="cliente">
            <td class="center">{{ $cliente->id }}</td>
            <td class="center">{{ $cliente->full_name  }}</td>
            <td class="center">{{ $cliente->email  }}</td>
            <td class="center">{{ $cliente->telefono  }}</td>
        </tr>
    @endforeach
    </tbody>
</table>