<table id="example" class="display" cellspacing="0" width="100%">
    <thead class="blue-grey">
    <tr class="white-text">
        <th class="center" class="center">id</th>
        <th class="center" class="center">email</th>
        <th class="center" class="center">Fecha de prestamo</th>
        <th class="center" class="center">Fecha para devolver</th>
        <th class="center" class="center">Extension</th>
        <th class="center" class="center">Entregado</th>
    </tr>
    </thead>
    <tfoot class="blue-grey">
    <tr class="white-text">
        <th class="center" class="center">id</th>
        <th class="center" class="center">email</th>
        <th class="center" class="center">Fecha de prestamo</th>
        <th class="center" class="center">Fecha para devolver</th>
        <th class="center" class="center">Extension</th>
        <th class="center" class="center">Entregado</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($prestamos as $prestamo)
        <tr id="{{ $prestamo['id']  }}" class="prestamo">
            <td class="center">{{ $prestamo['id'] }}</td>
            <td class="center user_email">{{ $prestamo['email'] }}</td>
            <td class="center">{{ $prestamo['fecha_prestamo'] }}</td>
            <td class="center">{{ $prestamo['fecha_devolucion'] }}</td>
            @if ( $prestamo['extension'] == 0 )
                <td class="center green-text">NO</td>
            @else
                <td class="center red-text">SI</td>
            @endif
            @if ( $prestamo['entregado'] == 0 )
                <td class="center red-text">NO</td>
            @else
                <td class="center green-text">SI</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>