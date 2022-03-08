@extends('layauts.base')
@section('title', 'Lista')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h1 class="text-center mb-5">Estudiantes</h1>

                <a class="btn btn-success mb-4" href="{{url('/form')}}">AGREGAR</a>

                <!--Mensaje de Eliminar-->
                @if(session('studenEliminado'))
                    <div class="alert alert-success">
                        {{ session('studenEliminado') }}
                    </div>
                @endif

            <!--Mensaje de Modificacion-->
                @if(session('studenModificado'))
                    <div class="alert alert-success">
                        {{session('studenModificado')}}
                    </div>
                @endif

            <!--Mensaje de Guardado-->
                @if(session('studenGuardado'))
                    <div class="alert alert-success">
                        {{session('studenGuardado')}}
                    </div>
                @endif

                <div class="col-xl-30">
                    <table class="table table-bordered table-striped text-center" style="background-color: #ABEBC6;">
                        <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Correo</th>
                            <th>Profesor</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($studen as $studens)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage').'/'. $studens->foto}}" class="img-fluid img-thumbnail"  width="100px" high="100px">
                                </td>

                                <td>{{$studens->nombre}}</td>
                                <td>{{$studens->grado}}</td>
                                <td>{{$studens->correo}}</td>
                                <td>{{$studens->nombre_profe}}</td>

                                <td>

                                    <div class="btn-group">

                                        <a href="{{ route('editform', $studens->id) }}" class="btn btn-primary mb-3 mr-2">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{ route('delete', $studens->id) }}" method="POST">
                                            @csrf @method('DELETE')

                                            <button type="submit" onclick="return confirm('¿Desea eliminar al estudiante?');" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

                <!--paginas-->
                {{ $studen->links() }}

            </div>
        </div>
    </div>

@endsection
