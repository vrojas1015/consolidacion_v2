<div class="table-responsive">
    <table class="table" id="promesas-table">
        <thead>
            <tr>
                <th>Promesa</th>
        <th>Pagado</th>
        <th>Id Cliente</th>
        <th>Compromete Central</th>
        <th>Compromete Cliente</th>
        <th>Fecha Promesa</th>
        <th>Fecha Pago</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($promesas as $promesa)
            <tr>
                <td>{{ $promesa->promesa }}</td>
            <td>{{ $promesa->pagado }}</td>
            <td>{{ $promesa->id_cliente }}</td>
            <td>{{ $promesa->compromete_central }}</td>
            <td>{{ $promesa->Compromete_cliente }}</td>
            <td>{{ $promesa->Fecha_promesa }}</td>
            <td>{{ $promesa->Fecha_pago }}</td>
                <td>
                    {!! Form::open(['route' => ['promesas.destroy', $promesa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('promesas.show', [$promesa->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('promesas.edit', [$promesa->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
