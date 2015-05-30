<table id="example" class="display" cellspacing="0" width="100%">
    <thead class="blue-grey">
    <tr class="white-text">
        <th class="center">#</th>
        <th class="center">Nombre</th>
        <th class="center">Email</th>
        <th class="center">Tipo</th>
        
    </tr>
    </thead>
    <tfoot class="blue-grey">
    <tr class="white-text">
        <th class="center">#</th>
        <th class="center">Nombre</th>
        <th class="center">Email</th>
        <th class="center">Tipo</th>
        
    </tr>
    </tfoot>
    <tbody>
    @foreach($cuentas as $cuenta)
        <tr id="{{ $cuenta->id  }}" class="cuenta">
            <td class="center">{{ $cuenta->id }}</td>
            <td class="center">{{ $cuenta->full_name  }}</td>
            <td class="center">{{ $cuenta->email  }}</td>
            <td class="center">{{ $cuenta->tipo  }}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>