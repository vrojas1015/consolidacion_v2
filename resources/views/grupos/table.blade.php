<div class="table-responsive">
    <table class="table" id="grupos-table">
        <thead>
            <tr>
                <th>Grupo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($grupos as $grupo)
            <tr>
                <td>{{ $grupo->grupo }}</td>
                <td>
                    {!! Form::open(['route' => ['grupos.destroy', $grupo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('grupos.show', [$grupo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('grupos.edit', [$grupo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
