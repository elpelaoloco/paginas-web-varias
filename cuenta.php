<?php session_start();
require("php/conexion.php");
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-2.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>  
    <header> <!-- Header-->
    <nav id="header-nav" class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <div class = "navbar-header">
                    <a id = "imagen" href="index.php">
                        <div id ="logo-image" alt = "logo" class="pull-left"></div>
                    </a>  

                </div>   
                <div class="dropdown">
                    <a class="d-flex justify-content-end btn btn-dark" href ="php/comprar.php">
                        Tienda
                    </a>
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Cuenta
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="php/infor_personal.php">Información Personal</a></li>
                      <li><a class="dropdown-item" href="php/filtrador.php">Funcionalidad Extra</a></li>
                      <li><a class="dropdown-item" href="index.php">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id = "fondo">
        <div>
        <br/>
            <h2 class="text-white d-flex justify-content-center">Bienvenido a Epic Prime</h2> 
            <h1 class="text-center d-flex justify-content-center text-white">Elige tu Proveedor De Streaming</h1>
            <h3 class="text-center d-flex justify-content-center text-white"> Haz click para luego ver</h3>
            <!--deberia mandar a una pagina distinta e indicar si esque hay o no  busqueda por nombre y proveedor item 3.2-->


    </div>
    

    <div class= "form-check d-flex justify-content-center ">
        <form method="post" action="php/suscripciones.php">
            <?php 
            $query = "SELECT nombre FROM proveedor GROUP BY nombre";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $consulta = $result -> fetchAll();
            foreach ($consulta as $proveedor) {
                echo "<br><input  value= $proveedor[0] class ='form-check-input text-white' type = 'radio' name = 'proveedor'> <label class = 'form-check-label text-white'>$proveedor[0]</label>";
                }
            ?>
            <br><br>
            <button type="submit" class = "btn btn-dark">  Ver  </button>
    </div>
    </form>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>
