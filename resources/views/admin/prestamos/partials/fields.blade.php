<div class="input-field col s12">
    {!! Form::email('email', null , ['id' => 'email', 'class' => 'validate'] ) !!}
    {!! Form::label('email', 'Correo del usuario', ['for' => 'email'] ) !!}
</div>

<div class="col s6">
    <select name="identificacion" class="input-field">
        <option value="" disabled selected>Elige un tipo de identificación...</option>
        <option value="ife">(IFE/INE)</option>
        <option value="licencia_conducir">Licencia de conducir</option>
        <option value="credencial_escolar">Credencial escolar</option>
        <option value="curp">CURP</option>
    </select>
</div>

<div class="input-field col s6">
    {!! Form::text('referencia', null , ['id' => 'referencia', 'class' => 'validate'] ) !!}
    {!! Form::label('referencia', 'Referencia', ['for' => 'referencia'] ) !!}
</div>