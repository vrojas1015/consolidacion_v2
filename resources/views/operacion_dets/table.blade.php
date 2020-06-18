<div class="table-responsive">
    <table class="table" id="operacionDets-table">
        <thead>
            <tr>
                <th>Fecha</th>
        <th>No Operaciones</th>
        <th>Id Proyecto</th>
        <th>Estatus</th>
        <th>Id Concepto</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($operacionDets as $operacionDet)
            <tr>
                <td>{{ $operacionDet->fecha }}</td>
            <td>{{ $operacionDet->no_operaciones }}</td>
            <td>{{ $operacionDet->id_proyecto }}</td>
            <td>{{ $operacionDet->estatus }}</td>
            <td>{{ $operacionDet->id_concepto }}</td>
                <td>
                    {!! Form::open(['route' => ['operacionDets.destroy', $operacionDet->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('operacionDets.show', [$operacionDet->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('operacionDets.edit', [$operacionDet->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
