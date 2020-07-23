@extends('layouts.gerentes')

@section('content')

    <section class="content-header">
        <div class="pull-center">
            <h1>Gerentes</h1>
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
                </div>
            </div>
        </div>
        <a type="button" class="btn btn-info float-md-left" href="{{ route('desglose.index') }}">Buscador <i class="fa fa-search" aria-hidden="true"></i>
        </a>
        <!--<button type="button" class="btn btn-success float-md-right"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
              Descargar reporte</button>-->
    </div>
@endsection

<script>
    @push('scripts')
    //$('div.alert').not('.alert-important').delay(7000).fadeOut(1000);
    @endpush
</script>
