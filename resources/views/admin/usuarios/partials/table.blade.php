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
    @foreach($usuarios as $usuario)
        <tr id="{{ $usuario->id  }}" class="usuario">
            <td class="center">{{ $usuario->id }}</td>
            <td class="center">{{ $usuario->full_name  }}</td>
            <td class="center">{{ $usuario->email  }}</td>
            <td class="center">{{ $usuario->telefono  }}</td>
        </tr>
    @endforeach
    </tbody>
</table>