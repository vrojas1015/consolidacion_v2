<div class="table-responsive">
    <table class="table table-hover text-center" id="proyectos-table">
        <thead class="thead-dark">
        <tr>
            <th>Region</th>
            <th>Nombre</th>
            <th colspan="3">Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->identificador }}</td>
                <td>{{ $proyecto->nombre }}</td>
                <td>
                    {!! Form::open(['route' => ['proyectos.destroy', $proyecto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{{ route('proyectos.show', [$proyecto->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('proyectos.edit', [$proyecto->id]) }}" class='btn btn-default btn-xs'>Editar</a>
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
