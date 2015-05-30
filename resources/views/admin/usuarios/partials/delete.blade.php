{!! Form::open([ 'route' => ['admin.usuarios.destroy', $usuario], 'method' => 'DELETE', 'class' => 'form-horizontal' ]) !!}
    <button type="submit" class="btn deep-orange lighten-2 waves-effect waves-light" onclick="return confirm('¿Seguro que deseas eliminar el registro?')">Eliminar</button>
{!! Form::close() !!}