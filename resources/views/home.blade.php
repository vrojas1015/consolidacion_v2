@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="pull-center">
            @if($sqls)
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="informacion">
                    <strong>¡Algunos gerentes no han cargado su informacion!</strong>
                    <ul>
                        @foreach($sqls as $sql)
                            <li>Proyecto: {!! $sql->numero_proyecto !!} - {!! $sql->nombre_proyecto !!}</li>
                        @endforeach
                    </ul>
                    <span>Solicitar informacion: </span>
                    <button type="button" id="btn-one" class="btn btn-primary">Solicitar</button>
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
                    <div id="chart" style="height: 300px;"></div>
                </div>
                <div class="col-sm">
                    One of three columns
                </div>
                <div class="col-sm">
                    One of three columns
                </div>
            </div>

        </div>
    </div>
@endsection

<script>
    @push('scripts')
    <script src = "https://unpkg.com/echarts/dist/echarts.min.js" ></script>
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
<script>
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
    });
</script>
@endpush
    </script>
