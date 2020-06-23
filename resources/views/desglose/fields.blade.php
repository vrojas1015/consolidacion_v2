<div class="form-group row">
    <div class="form-group col-sm-5">
        {!! Form::label('primero', 'Inicio:') !!}
        {!! Form::date('primero', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-5">
        {!! Form::label('segundo', 'Final:') !!}
        {!! Form::date('segundo', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-2">
        <br>
    {!! Form::submit('buscar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('home') }}" class="btn btn-default">Cancelar</a>
    </div>
</div>
