<?php
session_start();
require("../php/conexion.php");
?>
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
            Datos Personales
            
            <?php 
            $usuario = $_SESSION["mail"];
            $contraseña = $_SESSION["contraseña"];
            $query = "SELECT * FROM usuarios_test WHERE mail = '$usuario' AND password = '$contraseña'";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $consulta = $result -> fetchAll();
            ?>
            <Table>
                <tr>
                    <th> Nombre</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                <?php 
                foreach($consulta as $miembro) {
                    echo "<tr><td>$miembro[0]</td><td>$miembro[1]</td><td>$miembro[2]</td></tr>";
                }
                ?>
            </Table>
            Suscripciones Activas
            <?php
                $query = "alguna query para este caso";
                $result = $db2 -> prepare($query);
                $result -> execute();
                $consulta = $result -> fetchAll();
            ?> 
            <Table>
                <tr>
                    <th>Usuario</th>
                    <th> proveedor</th>
                    <th>suscripcion</th>
                    <th>titulo</th>
                </tr>
                <?php 
                    foreach($consulta as $miembro) {
                        echo "<tr><td>$miembro[0]</td><td>$miembro[1]</td><td>$miembro[2]</td>td>$miembro[3]</td></tr>";
                    }
                ?>
            </Table>
            Horas Activas
            <?php
                $query = "alguna query para este caso";
                $result = $db2 -> prepare($query);
                $result -> execute();
                $consulta = $result -> fetchAll();
            ?> 
            <Table>
                <tr>
                    <th>Usuario</th>
                    <th> Horas activas</th>

                </tr>
                <?php 
                    foreach($consulta as $miembro) {
                        echo "<tr><td>$miembro[0]</td><td>$miembro[1]</td></tr>";
                    }
                ?>
            </Table>

        </div>
    </div>    
    </main>         
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>