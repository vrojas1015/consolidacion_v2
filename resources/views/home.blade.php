@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="pull-center">
            @if($sqls)
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="informacion">
                    <strong>¡Algunos gerentes no han cargado su informacion!</strong>
                    <ul>
                        @foreach($sqls as $sql)
                            <li>Proyecto: {!! $sql->numero_proyecto !!} / {!! $sql->nombre_proyecto !!}
                                - {!! $sql->correo !!}</li>
                        @endforeach
                    </ul>
                    <hr>
                    {!! Form::open(['route' => 'email']) !!}
                    {!! Form::submit('Solicita a los gerentes la carga de informacion', ['class' => 'btn btn-primary', 'id' => 'Solicitar']) !!}
                    {!! Form::close() !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @else
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="informacion">
                    <strong>¡Todo bien!</strong> Parece que todos tus gerentes han cargado su informacion.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('layouts.errors')
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="text-center">
            <div class="row">
                <div class="col-sm">
                    <table class="table table-hover text-center">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">% Porcentaje</th>
                            <th scope="col">Variacion</th>
                            <th scope="col">Grupo</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($desgloses as $desglose)
                                <td>{!! $desglose->porcentaje !!}</td>
                                <td>{!! $desglose->variacion !!}</td>
                                <td>{!! $desglose->grupo !!}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

<script>
    @push('scripts')
    //$('div.alert').not('.alert-important').delay(7000).fadeOut(1000);
    @endpush
</script>
