{!! Form::open([ 'route' => ['admin.cuentas.destroy', $cuenta], 'method' => 'DELETE', 'class' => 'form-horizontal' ]) !!}
	<a href="{{ route('admin.cuentas.edit', $cuenta->id) }}" class="btn waves-effect waves-light light-blue lighten-3">Editar</a>
    <button type="submit" class="btn deep-orange lighten-2 waves-effect waves-light" onclick="return confirm('¿Seguro que deseas eliminar el registro?')">Eliminar</button>
{!! Form::close() !!}