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
                    &laquo; Volver

                </a>
            </div>
        </nav>
    </header>
    <main class="container" id="main-content">
        <div class="row">
            <h1 id="inicio" class="d-flex justify-content-center">Epic Prime</h1>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 d-flex justify-content-center">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" id="boton">Top 3 Peliculas y Series</button>
            </div>    
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Top 3 Peliculas y Series</h5>
                            
                            <ul>
                                <?php  # top 3 peliculas y series mas vistas item 3.2
                                $proveedor = $_POST["proveedor"];
                                echo $proveedor;
                                $query = "SELECT * FROM (SELECT peliculas.pid, peliculas.titulo, COUNT(peliculas.pid) as cuenta FROM visualizaciones_pelicula, peliculas, peliculas_en_arriendo, 
                                proveedor WHERE visualizaciones_pelicula.pid = peliculas.pid AND peliculas_en_arriendo.pid = peliculas.pid 
                                AND peliculas_en_arriendo.pro_id = proveedor.pro_id AND proveedor.nombre = '$proveedor' GROUP BY peliculas.titulo, peliculas.pid UNION SELECT peliculas.pid, peliculas.titulo, 
                                COUNT(peliculas.pid) as cuenta FROM visualizaciones_pelicula, peliculas, peliculas_no_arriendo, proveedor 
                                WHERE visualizaciones_pelicula.pid = peliculas.pid AND peliculas_no_arriendo.pid = peliculas.pid 
                                AND peliculas_no_arriendo.pro_id = proveedor.pro_id AND proveedor.nombre = '$proveedor' GROUP BY peliculas.pid, peliculas.titulo) as p ORDER BY -cuenta LIMIT 3";
                                $result = $db2 -> prepare($query);
                                $result -> execute();
                                $consulta = $result -> fetchAll();

                                echo "<li><a class='text-white' href='#'>Peliculas:</a></li><br/>";
                                foreach ($consulta as $top) {
                                    echo "<li><a class='text-white' href='#'>$top[1]</a><li>";
                                }

                                $query = "SELECT * FROM (SELECT series.sid, series.nombre, COUNT(series.sid) as cuenta 
                                FROM series, proveedores_serie, proveedor, visualizaciones_capitulo, capitulo, capitulo_serie 
                                WHERE visualizaciones_capitulo.cid=capitulo.cid AND capitulo.cid=capitulo_serie.cid AND capitulo_serie.sid=series.sid 
                                AND series.sid = proveedores_serie.sid 
                                AND proveedores_serie.pro_id = proveedor.pro_id AND proveedor.nombre = '$proveedor' GROUP BY series.sid, series.nombre) as s ORDER BY -cuenta LIMIT 3";
                                $result = $db2 -> prepare($query);
                                $result -> execute();
                                $consulta = $result -> fetchAll();
                                echo "<br/><li><a class='text-white' href='#'>Series:</a></li><br/>";
                                foreach ($consulta as $top) {
                                    echo "<li><a class='text-white' href='#'>$top[1]</a><li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                    

            
                </ul>  
            <?php #valor,cantidad y series segun sucripcion item 3.2
            $proveedor = $_POST["proveedor"];
            $query = "SELECT * FROM (SELECT pro_id, nombre, costo, SUM(cuenta) as suma FROM (SELECT proveedor.pro_id, proveedor.nombre, proveedor.costo, COUNT(proveedor.pro_id) 
            as cuenta FROM proveedor, peliculas, peliculas_en_arriendo WHERE peliculas.pid = peliculas_en_arriendo.pid 
            AND proveedor.pro_id = peliculas_en_arriendo.pro_id AND proveedor.nombre = '$proveedor' GROUP BY proveedor.pro_id 
            UNION SELECT proveedor.pro_id, proveedor.nombre, proveedor.costo, COUNT(proveedor.pro_id) as cuenta FROM proveedor, peliculas, 
            peliculas_no_arriendo WHERE peliculas.pid = peliculas_no_arriendo.pid AND proveedor.pro_id = peliculas_no_arriendo.pro_id AND proveedor.nombre = '$proveedor'
            GROUP BY proveedor.pro_id) as p GROUP BY pro_id, nombre, costo) as p, (SELECT proveedor.pro_id, proveedor.nombre, proveedor.costo, COUNT(proveedor.pro_id) as cuenta FROM proveedor, series, 
            proveedores_serie WHERE series.sid = proveedores_serie.sid AND proveedor.pro_id = proveedores_serie.pro_id 
            AND proveedor.nombre = '$proveedor' GROUP BY proveedor.pro_id) as s";
            
            $result = $db2 -> prepare($query);
            $result -> execute();
            $consulta = $result -> fetchAll();
            echo "<h1 class='text-white d-flex justify-content-center'> $proveedor </h1>";
            ?>
            <Table class="text-white">
                <tr>
                    <th>Valor</th>
                    <th>Cantidad Peliculas</th>
                    <th>Cantidad Series</th>
                </tr>
                <?php 
                    foreach($consulta as $info) {
                        echo "<tr><td>$info[2]</td><td>$info[3]</td><td>$info[7]</td></tr>";
                    }
                ?>
            </Table>
        </div>
    </div>    
    </main>
    <script src="../js/popper.min.js"></script>         
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>
