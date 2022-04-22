@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Editar') <!--nombre pagina, nombre de seccion-->
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">


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

                <div class="card border-primary">
                    <form action="{{ route('edit', $studen->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')

                        <div class="card-header border-primary text-center text-white" style="background-color: #21618C;" >MODIFICAR USUARIO</div>

                        <div class="card-body" style="background-color: #D6EAF8;">

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

                            <img src="{{ asset('storage').'/'. $studen->foto}}" class="img-fluid img-thumbnail"  width="100px">
                            <div class="input-group mb-3 col-md-13">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01"
                                      aria-describedby="inputGroupFileAddon01" value="{{$studen->foto}}">

                                    <label class="custom-file-label" for="inputGroupFile01">Eliga un archivo</label>
                                </div>
                            </div>

                            <!--para elegir un profesor-->
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Proferosor</label>
                                        <select name="id_profer" class="custom-select mr-sm-2" id="inlineFormCustomSelect" >
                                            <option class="align-self-center text-center" value="">--Profesores--</option>

                                            @foreach($profer as $profers)
                                                <option value="{{$profers->id_profer}}"> {{$profers->nombre_profe}}  </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-primary text-dark col-md-9 offset-2 mb-2" style="background-color: #5499C7;">
                                    <i class="fas fa-undo"> Modificar</i>
                                </button>

                                <a class="btn btn-outline-secondary col-md-9 offset-2 text-dark" href="{{url('/')}}" role="button">
                                    <i class="far fa-hand-point-left"> Regresar</i>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

