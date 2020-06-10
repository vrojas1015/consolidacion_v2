<div class="table-responsive">
    <table class="table" id="operacions-table">
        <thead>
            <tr>
                <th>Id Proyecto</th>
        <th>Dia</th>
        <th>No Operaciones</th>
        <th>Ano</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($operacions as $operacion)
            <tr>
                <td>{{ $operacion->id_proyecto }}</td>
            <td>{{ $operacion->dia }}</td>
            <td>{{ $operacion->no_operaciones }}</td>
            <td>{{ $operacion->ano }}</td>
                <td>
                    {!! Form::open(['route' => ['operacions.destroy', $operacion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('operacions.show', [$operacion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('operacions.edit', [$operacion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
