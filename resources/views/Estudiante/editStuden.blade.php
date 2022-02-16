@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Editar') <!--nombre pagina, nombre de seccion-->
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

                <!--Mensaje de Modificacion-->
                @if(session('studenModificado'))
                    <div class="alert alert-success">
                        {{session('studenModificado')}}
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
                    <form action="{{ route('edit', $studen->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')

                        <div class="card-header border-success text-center" style="background-color: #EAFAF1;" >MODIFICAR USUARIO</div>

                        <div class="card-body">

                            <div class="row form-group">
                                <label for="" class="col-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{$studen->nombre}}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Grado</label>
                                <input type="text" name="grado" class="form-control col-md-9" value="{{$studen->grado}}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Email</label>
                                <input type="text" name="correo" class="form-control col-md-9" value="{{$studen->correo}}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Foto</label>
                                <img src="{{ asset('storage').'/'. $studen->foto}}" class="img-fluid img-thumbnail"  width="100px" >
                                <input type="file" name="foto" class="form-control col-md-9" value="{{$studen->foto}}">
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-9 offset-2">Modificar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <a class="btn btn-light btn-xs mt-5" href="{{ url('/') }}">&laquo volver</a>
    </div>
@endsection
