<div class="input-field col s12">
    {!! Form::text('email', null , ['class' => 'validate', 'id' => 'email'] ) !!}
    {!! Form::label('email', 'Correo', ['for' => 'email'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::text('nombre', null , ['class' => 'validate', 'id' => 'nombre'] ) !!}
    {!! Form::label('nombre', 'Nombre', ['for' => 'nombre'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::text('apellidos', null , ['class' => 'validate', 'id' => 'apellidos'] ) !!}
    {!! Form::label('apellidos', 'Apellido(s)', ['for' => 'apellidos'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::text('direccion', null , ['class' => 'validate', 'id' => 'direccion'] ) !!}
    {!! Form::label('direccion', 'Dirección', ['for' => 'direccion'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::text('telefono', null , ['class' => 'validate', 'id' => 'telefono', 'maxlength' => '10' ] ) !!}
    {!! Form::label('telefono', 'Teléfono', ['for' => 'telefono'] ) !!}
</div>
