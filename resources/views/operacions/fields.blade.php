<!-- Id Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_proyecto', 'Id Proyecto:') !!}
    {!! Form::number('id_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!-- Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia', 'Dia:') !!}
    {!! Form::number('dia', null, ['class' => 'form-control']) !!}
</div>

<!-- No Operaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_operaciones', 'No Operaciones:') !!}
    {!! Form::number('no_operaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Ano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ano', 'Ano:') !!}
    {!! Form::number('ano', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('operacions.index') }}" class="btn btn-default">Cancel</a>
</div>
