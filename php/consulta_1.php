<?php
session_start();
require("../php/conexion.php");
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Epic Prime</title>
</head>
<body>
    <div id = "fondo">
    <header><!-- header -->
        <nav id="header-nav" class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <div class = "navbar-header">
                    <a id = "imagen" href="index.html">
                        <div id ="logo-image" alt = "logo" class="pull-left visible-lg visible-md visible-sm"></div>
                    </a>   
                </body>  

                </div>
                <a id="registro" class= "btn btn-dark pull-left d-flex nav-item justify-content-end" href="../php/filtrador.php">
                    &laquo; Volver

                </a>     
            </div>
        </nav>
    </header>
    
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>


<?php 

    $usuario = $_SESSION["email"];
    $contraseña = $_SESSION["contraseña"];
    $query = "SELECT id FROM usuarios_test WHERE mail = '$usuario'";
    $result = $db -> prepare($query);
    $result -> execute();
    $consulta = $result -> fetchAll();

    foreach($consulta as $yapa) {
        $id = $yapa[0];
    }

    $tipo = $_POST["tipo"];

 	$query2 = "SELECT peliculas.pid, titulo, duracion, clasificacion, ano, genero_p.genero 
     FROM peliculas, genero_p, subgenero 
     WHERE '$tipo' = subgenero.genero
     AND subgenero.nombre_subgenero = genero_p.genero 
     AND genero_p.pid = peliculas.pid 
     UNION 
     SELECT peliculas.pid, titulo, duracion, clasificacion, ano, genero_p.genero
     FROM peliculas, genero_p
     WHERE genero_p.genero = '$tipo'
     AND peliculas.pid = genero_p.pid";

	$result2 = $db2 -> prepare($query2);
	$result2 -> execute();
	$multimedias = $result2 -> fetchAll();
?>
<br/><br/>

  
      <?php
        echo "<h1 class='text-white d-flex justify-content-center'> Peliculas: </h1><br/>";

        foreach ($multimedias as $multimedia) {
         echo "<h2 class='text-white d-flex justify-content-center'> $multimedia[1] </h2>";
      }
      ?>
      

    </body>
    </html>