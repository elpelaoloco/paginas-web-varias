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
                <a id="registro" class= "btn btn-dark pull-left d-flex nav-item justify-content-end" href="../cuenta.php">
                    &laquo; Volver

                </a>     
            </div>
        </nav>
    </header>
    <main class="container" id="main-content">
        <div class="row">
            <h1 id="inicio" class="d-flex justify-content-center">Epic Prime</h1>
            <h2 class="d-flex justify-content-center text-white">Datos Personales</h2>
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

            $query = "SELECT * FROM usuarios_test WHERE mail = '$usuario' AND password = '$contraseña'";
            $result = $db -> prepare($query);
            $result -> execute();
            $consulta = $result -> fetchAll();
            ?>
            <br/>
            <Table class="text-white d-flex justify-content-center">
                <tr>
                    <th>Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>Email</th>
                </tr>
                <?php 
                foreach($consulta as $miembro) {
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$miembro[1]</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$miembro[4]</td><td>$miembro[2]</td></tr>";
                }
                ?>
           <?php
                require("../php/conexion.php");

                $query = "SELECT sum(usuario_horas_jugadas.cantidad) FROM usuario_horas_jugadas 
                WHERE usuario_horas_jugadas.id_usuario = $id GROUP BY usuario_horas_jugadas.id_usuario";

                $result = $db -> prepare($query);
                $result -> execute();
                $consulta = $result -> fetchAll();
                $rows = count($consulta);

            ?> 
            <br/><br/>
            <Table class="text-white">
            <br/>
                <tr>
                    <th class='text-white d-flex justify-content-center'> Horas gastadas de juego:</th>
                </tr>
                <?php 

                if ($rows == 0) {
                    echo "<tr><td class='text-white d-flex justify-content-center'>0</td></tr><br/>";
                }

                if ($rows == 1) {    
                    foreach($consulta as $miembro) {
                        echo "<tr><td class='text-white d-flex justify-content-center'> $miembro[0]</td></tr><br/>";
                    }
                }

                

                ?>
            </Table>

            </Table>
            
           <?php
                require("../php/conexion.php");

                $query = "SELECT usuarios.id, SUM(peliculas.duracion) FROM usuarios, visualizaciones_pelicula, peliculas 
                WHERE usuarios.id = visualizaciones_pelicula.uid 
                AND usuarios.id = 5 AND visualizaciones_pelicula.pid = peliculas.pid GROUP BY usuarios.id";

                $result = $db2 -> prepare($query);
                $result -> execute();
                $consulta = $result -> fetchAll();
                $rows = count($consulta);
                
                if ($rows == 0) {
                    $peliculas = 0;
                }

                if ($rows == 1) {    
                    foreach($consulta as $miembro) {
                        $peliculas = $miembro[1];
                    }
                }

                $query2 = "SELECT usuarios.id, SUM(capitulo.duracion) FROM usuarios, visualizaciones_capitulo, capitulo 
                WHERE usuarios.id = visualizaciones_capitulo.uid AND usuarios.id = 5 AND visualizaciones_capitulo.cid = capitulo.cid 
                GROUP BY usuarios.id";

                $result2 = $db2 -> prepare($query2);
                $result2 -> execute();
                $consulta2 = $result2 -> fetchAll();
                $rows = count($consulta2);

                if ($rows == 0) {
                    $series = 0;
                }

                if ($rows == 1) {    
                    foreach($consulta2 as $miembro) {
                        $series = $miembro[1];
                    }
                }


                $suma = $series + $peliculas;


            ?> 
            <Table class="text-white">
                <tr>
                    <th class='text-white d-flex justify-content-center'> Horas gastadas viendo contenido:</th>
                </tr>
                <?php 

                echo "<tr><td class='text-white d-flex justify-content-center'>$suma</td></tr><br/>";


                ?>
            </Table>
               



            <form align="center" action="horas_activas_juegos.php" method="post">
            <br/>
            <input type="submit" class="btn btn-dark" value="Ver Suscripciones Activas de VideoJuegos">
            </form>
            <br/><br/>
            <form align="center" action="horas_activas_pelis.php" method="post">
            <input type="submit" class="btn btn-dark" value="Ver Suscripciones Activas de Streaming">
            </form>
            <br/><br/>
            <form align="center" action="../php/cambio_contraseña.php" method="get">
            <input type="submit" class="btn btn-dark" value="Cambiar Contraseña">
            </form>
        </div> 
    </div>    
    </main>         
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
</body>



</html>