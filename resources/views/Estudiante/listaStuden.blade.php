@extends('layauts.base')
@section('title', 'Lista')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h2 class="text-center mb-5">Estudiantes</h2>

                <a class="btn btn-success mb-4" href="{{url('/form')}}">AGREGAR USUARIO</a>

                <!--Mensaje de Eliminar-->
                @if(session('studenEliminado'))
                    <div class="alert alert-success">
                        {{ session('studenEliminado') }}
                    </div>
                @endif

                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($studen as $studens)
                        <tr>
                            <td>
                             <img src="{{ asset('storage').'/'. $studens->foto}}" class="img-fluid img-thumbnail"  width="100px" >
                            </td>

                            <td>{{$studens->nombre}}</td>
                            <td>{{$studens->grado}}</td>
                            <td>{{$studens->correo}}</td>

                            <td>

                                <form action="{{ route('delete', $studens->id) }}" method="POST">
                                @csrf @method('DELETE')

                                    <button type="submit" onclick="return confirm('¿Desea eliminar al estudiante?');" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

                <!--paginas-->
                {{ $studen->onEachSide(3)->links() }}

            </div>
        </div>
    </div>

@endsection
