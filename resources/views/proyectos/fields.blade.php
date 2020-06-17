<div class="form-group col-sm-12">
    <label for="sel1">Regiones:</label>
    <select class="form-control" id="sel1" name="id_region">
        <option value="">Seleccione una opcion</option>
        @foreach($regiones as $region)
            <option value="{!! $region->id !!}">{!! $region->identificador !!}/{!! $region->Nombre !!}</option>
        @endforeach
    </select>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('proyectos.index') }}" class="btn btn-default">Cancelar</a>
</div>
