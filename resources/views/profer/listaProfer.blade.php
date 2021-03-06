@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Lista de Profesores') <!--nombre pagina, nombre de seccion-->
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h1 class="text-center mb-5">
                    <i class="fas fa-user-tie"> Profesor</i>
                </h1>

                <a class="btn btn-success mb-4" href="{{url('/formProfer')}}">
                    <i class="fas fa-user-plus"> AGREGAR</i>
                </a>

                <div class="col-xl-30">
                    <table class="table table-bordered table-striped text-center" style="background-color: #ABEBC6;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Profersor</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($profer as $profers)
                            <tr>

                                <td>{{$profers->id_profer}}</td>
                                <td>{{$profers->nombre_profe}}</td>

                                <td>

                                    <div class="btn-group">

                                        <a href="{{route('editformProfer', $profers->id_profer)}}" class="btn btn-primary mb-3 mr-2">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{route('deleteProfer', $profers->id_profer)}}" method="POST" class="Alert-eliminar">
                                            @csrf @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
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
                {{ $profer->onEachSide(3)->links() }}

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Mensaje de Modificacion-->
    @if(session('proferModificado')=='Nombre del Profesor Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Nombre del Profesor Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <!--Mensaje de Guardado-->
    @if(session('proferGuardado')=='Nombre del Profesor Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Nombre del Profesor Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif


    <!--Mensaje de Eliminado-->
    @if(session('proferEliminado')=='Eliminado el profesor')
        <script>
            Swal.fire(
                '??Eliminado!',
                'Se elimino al profesor exitosamente',
                'success'
            )
        </script>
    @endif
        <script>
            $('.Alert-eliminar').submit(function (e){
              e.preventDefault();

                Swal.fire({
                    title: '??Esta seguro que desea eliminar al Profesor?',
                    text: "Si presiona si se eliminara definitivamente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        </script>

    @if(session('alerta')=='ok')

        <script>
            Swal.fire({
                title: 'No se puede eliminar al profesor',
                text:'Este profesor ya esta ligado a los estudiantes, por ende es imposible eliminarlo',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif
@endsection
