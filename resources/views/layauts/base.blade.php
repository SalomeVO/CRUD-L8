<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_L^8-@yield('title')</title> <!--nombre de la pagina-->

    <!--Estilos de Boopstrap y CSS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--Se agrega Boostrap a traves de el CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--Para agragar el icono de basurero-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--Para iconoz-->
    <script src="https://use.fontawesome.com/releases/vVERSION/js/all.js" data-mutate-approach="sync"></script>

</head>

 <body style="background-color: #E8F8F5;">
    <nav class="navbar navbar-expand-lg navbar-light bg-p-3 mb-2 text-white" style="background-color: #87CEFA;">
        <!--Logo de navbar-->
        <a class="navbar-brand" href="{{url('/')}}"><img src="https://umg.edu.gt/assets/umg.png" alt="" width="80" class="rounded-circle"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-clipboard"> TABLAS</i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: transparent;">
                        <a class="nav-link disabled">
                            <i class="fas fa-user-graduate"> Tabla Estudiante</i>
                        </a>
                        <a class="dropdown-item" href="{{url('/')}}">
                            <i class="fas fa-graduation-cap"> Lista</i>
                        </a>
                        <a class="dropdown-item" href="{{url('/form')}}">
                            <i class="fas fa-plus"> Agregar</i>
                        </a>
                            <div class="dropdown-divider"></div>
                        <a class="nav-link disabled">
                            <i class="fas fa-user-tie"> Tabla Profesor</i>
                        </a>
                        <a class="dropdown-item" href="{{url('/profer')}}">
                            <i class="fas fa-chalkboard-teacher"> Lista</i>
                        </a>
                        <a class="dropdown-item" href="{{url('/formProfer')}}">
                            <i class="fas fa-user-plus"> Agregar</i>
                        </a>
                    </div>
                </li>
            </ul>
            <form>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="https://github.com/SalomeVO/SalomeV_0909_20_5202.git" >
                            <i class="fa-2x fab fa-github-square"></i>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="https://youtu.be/w7OSE1-8F8s" >
                            <i class="fa-2x fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

   <div class="container">
     @yield('content') <!--para navbar-->
   </div>

@yield('js')<!--Ayuda con mostrar el mensaje de error-->
 </body>
</html>
