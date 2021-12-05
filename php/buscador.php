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
                </div>
                <a id="registro" class= "btn btn-dark pull-left d-flex nav-item justify-content-end" href="../cuenta.php">
                    &laquo; Volver a Menú Inicial

                </a>
            </div>
        </nav>
    </header>
    <main class="container" id="main-content">
        <div class="row">
            <h1 id="inicio" class="d-flex justify-content-center">Epic Prime</h1>
            <h2 id ="texto" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 d-flex justify-content-center">
                <?php
                $proveedor = $_POST["Proveedor"];
                $titulo = $_POST["Nombre"];
                #query para buscar si existe o no
                $query = "SELECT tabla_oficial.nombre as nombre_serie_pelicula, clasificacion, puntuacion, ano, tabla_oficial.pro_id as id_proveedor, 
                proveedor.nombre as nombre_proveedor, costo as costo_suscripcion
                FROM (
                SELECT nombre, clasificacion, puntuacion, ano, pro_id
                FROM series, proveedores_serie
                WHERE UPPER(series.nombre) LIKE UPPER('$titulo')
                AND proveedores_serie.sid = series.sid
                UNION
                SELECT peliculas.titulo as nombre, clasificacion, puntuacion, ano, pro_id
                FROM peliculas, peliculas_no_arriendo
                WHERE UPPER(peliculas.titulo) LIKE UPPER('$titulo')
                AND peliculas_no_arriendo.pid = peliculas.pid
                UNION
                SELECT peliculas.titulo as nombre, clasificacion, puntuacion, ano, pro_id
                FROM peliculas, peliculas_en_arriendo
                WHERE UPPER(peliculas.titulo) LIKE UPPER('$titulo')
                AND peliculas_en_arriendo.pid = peliculas.pid
                ) as tabla_oficial, proveedor
                WHERE tabla_oficial.pro_id = proveedor.pro_id
                AND UPPER(proveedor.nombre) LIKE UPPER('$proveedor')";

                $result = $db2 -> prepare($query);
                $result -> execute();
                $consulta = $result -> fetchAll();
                
                $rows = count($consulta);

                if ($rows == 0) {    
                    echo "<a class='text-white' href='#'>No se encuentra la Película/Serie en el Proveedor</a>";
                }

                if ($rows == 1) {    
                    echo "<a class='text-white' href='#'>Si se encuentra la Película/Serie en el Proveedor</a>";
                }
                ?>
            </h2>  
            </h1>
            

        </div>
    </div>    
    </main>         
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>