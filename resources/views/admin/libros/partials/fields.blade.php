<div class="input-field col s12">
    {!! Form::text('codigo', null , ['class' => 'validate', 'id' => 'codigo',    'maxlength' => '10' ]  ) !!}
    {!! Form::label('codigo', 'Codigo', ['for' => 'codigo'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::text('no_ejemplares', null , ['class' => 'validate', 'id' => 'no_ejemplares', 'maxlength' => '5'  ] ) !!}
    {!! Form::label('no_ejemplares', 'Número de ejemplares', ['for' => 'no_ejemplares'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::text('titulo', null , ['class' => 'validate', 'id' => 'titulo' ] ) !!}
    {!! Form::label('titulo', 'Título', ['for' => 'titulo'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::text('autor', null , ['class' => 'validate', 'id' => 'autor' ] ) !!}
    {!! Form::label('autor', 'Autor', ['for' => 'autor'] ) !!}
</div>


<div class="input-field col s12">
    {!! Form::text('no_paginas', null , ['class' => 'validate', 'id' => 'no_paginas', 'maxlength' => '5'  ] ) !!}
    {!! Form::label('no_paginas', 'Número de páginas', ['for' => 'no_paginas'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::text('editorial', null , ['class' => 'validate', 'id' => 'editorial' ] ) !!}
    {!! Form::label('editorial', 'Editorial', ['for' => 'editorial'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::text('edicion', null , ['class' => 'validate', 'id' => 'edicion', 'maxlength' => '3' ]  ) !!}
    {!! Form::label('edicion', 'Número de edición', ['for' => 'edicion'] ) !!}
</div>

<div class="input-field col s12">
    {!! Form::textarea('descripcion', null , ['class' => 'validate materialize-textarea', 'id' => 'descripcion' ] ) !!}
    {!! Form::label('descripcion', 'Descripción', ['for' => 'descripcion'] ) !!}
</div>

<div class="input-field col s12">
    <select name="idioma">
        <option value="" disabled selected>Elige un idioma...</option>
        <option value="espanol">Español</option>
        <option value="ingles">Inglés</option>
        <option value="frances">Frances</option>
        <option value="aleman">Alemán</option>
        <option value="japones">Japonés</option>
        <option value="chino">Chino</option>
    </select>
</div>


