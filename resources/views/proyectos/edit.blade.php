@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Proyecto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   @foreach($proyectos as $proyecto)
                   {!! Form::model($proyecto, ['route' => ['proyectos.update', $proyecto->id], 'method' => 'patch']) !!}

                        @include('proyectos.fields')

                   {!! Form::close() !!}
                   @endforeach
               </div>
           </div>
       </div>
   </div>
@endsection
