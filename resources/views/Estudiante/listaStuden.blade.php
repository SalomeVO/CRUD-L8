@extends('layauts.base')
@section('title', 'Lista')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h1 class="text-center mb-5">
                    <i class="fas fa-user-graduate"> Estudiantes</i>
                </h1>

                <a class="btn btn-success mb-4" href="{{url('/form')}}">
                    <i class="fas fa-user-plus"> AGREGAR</i>
                </a>

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

                                        <form action="{{ route('delete', $studens->id) }}" id="{{$studens->id}}" class="Alert-danger" method="POST">
                                            @method('DELETE') @csrf

                                            <button type="button" onclick="eliminar({{$studens->id}})" class="btn btn-danger">
                                                <i class="fas fa-dumpster"></i>
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

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Mensaje de Modificacion-->
    @if(session('studenModificado')=='Estudiante Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Estudiante Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <!--Mensaje de Guardado-->
    @if(session('studenGuardado')=='Estudiante Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Estudiante Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <!--Mensaje de Eliminado-->
    @if(session('studenEliminado')=='Eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se elimino al profesor exitosamente',
                'success'
            )
        </script>
    @endif

    <script>
        function eliminar(studen){
                Swal.fire({
                    title: '¿Esta seguro que desea eliminar al Estudiante?',
                    text: "Si presiona si se eliminara definitivamente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(studen).submit()
                    }
                })
            }
    </script>
@endsection

