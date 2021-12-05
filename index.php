<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Epic Prime</title>
</head>
<body>

<br>

<h3 align="center"> Importación</h3>

<form align="center" action="php/migracion_pagos.php" method="post">
  <input type="submit" value="Buscar">
</form>

<br>

    <div id = "fondo">
    <header><!-- header -->
        <nav id="header-nav" class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <div class = "navbar-header">
                    <a id = "imagen" href="index.html">
                        <div id ="logo-image" alt = "logo" class="pull-left visible-lg visible-md visible-sm"></div>
                    </a>   
                </div>
                <li class="pull-left d-flex nav-item justify-content-end">
                    <button id="registro" type="button" class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#Modal2">Registrarse</button>
                </li>
            </div>
        </nav>
    </header>
    <main class="container" id="main-content">
        <div class="row">
            <h1 id="inicio" class="d-flex justify-content-center">Epic Prime</h1>
            <h2 id ="texto" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 d-flex justify-content-center">El mejor servicio de streaming y videojuegos del pais</h1>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 d-flex justify-content-center">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" id="boton">Iniciar Sesion</button>
            </div>
            <!--  pop up de iniciar sesion aqui se mete el php -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingreso</h5>
                            <button type="button" id="salida" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body d-flex justify-content-center">
                            <form action="php/validacion.php" method="post">
                                <img  id= "gamepad" src="gamepad-definitivo.png" height="100px" width="150px" alt="gamepad">
                                <input class="form-control" type="email" name="email" placeholder="Email"><br>
                                <input class = "form-control" type="password" name="contraseña" placeholder="Contraseña">
                                <br>
                                <br>
                                <button  id="botones" type="submit" class="btn btn-primary">Iniciar Sesion</button>
                                <button id="botones" type="button" class="btn-cancel btn-secondary" data-bs-dismiss="modal">Close</button>   
                            </form>
                        </div>
                    </div>
                </div>
                <!-- pop up de registrarse-->
            </div>
            <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear Cuenta</h5>
                            <button type="button" id="salida" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body d-flex justify-content-center">
                            <form action="php/registro.php" method="post">
                                <img  id= "gamepad" src="consola-removebg-preview.png" height="100px" width="150px" alt="gamepad">
                                <input class="form-control" type="text" name="name" placeholder="Nombre"><br>
                                <input class="form-control" type="text" name="user" placeholder="Usuario"><br>
                                <input type="email" class="form-control" name="email" placeholder="Email"><br>
                                <input class = "form-control" type="password" name="contraseña" placeholder="Contraseña">
                                <br>
                                <br>
                                <button  id="botones" type="submit" class="btn btn-primary">Registrarse</button>
                                <button id="botones" type="button" class="btn-cancel btn-secondary" data-bs-dismiss="modal">Close</button>  
                                
                            </form>
                        </div> 
                    </div>
                </div>
            </div>


        </div>
    </div>    
    </main>         
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>