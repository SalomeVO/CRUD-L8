@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Formulario') <!--nombre pagina, nombre de seccion-->
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

               <!--Mensaje de Error-->
                @if(session('studenGuardado'))
                    <div class="alert alert-success">
                        {{session('studenGuardado')}}
                    </div>
                @endif

                <!--Validacion de errores-->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                <div class="card border-success">
                    <form action="{{ route('Estudiante.save')}}" method="POST" enctype="multipart/form-data">
                     @csrf

                        <div class="card-header border-success text-center" style="background-color: #EAFAF1;" >AGREGAR USUARIO</div>

                        <div class="card-body">

                            <div class="row form-group">
                                <label for="" class="col-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Grado</label>
                                <input type="text" name="grado" class="form-control col-md-9">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Email</label>
                                <input type="text" name="correo" class="form-control col-md-9">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Foto</label>
                                <input type="file" name="foto" class="form-control col-md-9">
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <a class="btn btn-light btn-xs mt-5" href="{{ url('/') }}">&laquo volver</a>
    </div>
@endsection
