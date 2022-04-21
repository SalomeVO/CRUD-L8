@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Formulario de Profesores') <!--nombre pagina, nombre de seccion-->
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


                <div class="card border-success">
                    <form action="{{ route('Profer.save')}}" method="POST" enctype="multipart/form-data" class="alerta">
                        @csrf

                        <div class="card-header border-success text-center text-white" style="background-color: #196F3D"; >AGREGAR PROFESOR</div>

                        <div class="card-body" style="background-color: #D4EFDF;">

                            <div class="row form-group">
                                <label for="" class="col-2">Nombre</label>
                                <input type="text" name="nombre_profe" class="form-control col-md-9">
                            </div>


                            <div class="row form-group">
                                <button type="submit" class="btn btn col-md-9 offset-2 text-dark mb-2" style="background-color: #58D68D;" >Guardar</button>

                                <a class="btn btn-outline-secondary col-md-9 offset-2 text-dark" href="{{url('/profer')}}" role="button">Regresar</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   @if(session('alerta')=='ok')

       <script>
           Swal.fire({
               title: 'No se pudo agregar al profesor',
               width: 600,
               padding: '3em',
               color: '#050404',
               background: '#fff url(/images/trees.png)',
               backdrop: `#F82D23`
           })
       </script>
   @endif

   @if(session('alertaQery')=='murio')

       <script>
           Swal.fire({
               title: 'No se pudo agregar al profesor',
               text:'Es un error de Base de datos',
               width: 600,
               padding: '3em',
               color: '#050404',
               background: '#fff url(/images/trees.png)',
               backdrop: `#F82D23`
           })
       </script>
   @endif
@endsection
