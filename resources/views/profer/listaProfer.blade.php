@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Lista de Profesores') <!--nombre pagina, nombre de seccion-->
@section('content')

    <!--Mensaje de Guardado-->
    @if(session('proferGuardado'))
        <div class="alert alert-success">
            {{session('proferGuardado')}}
        </div>
    @endif

@endsection
