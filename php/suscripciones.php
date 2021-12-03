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
            </form>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                <?php  # top 3 peliculas y series mas vistas item 3.2
                    $query = "qery cualquiera";
                    $result = $db2 -> prepare($query);
                    $result -> execute();
                    $consulta = $result -> fetchAll();
    
                    foreach ($consulta as $top) {
                        echo "<li><a class='dropdown-item' href='#'>$top[0]</a></li>";
                    }
                ?>
            </ul>
            <?php #valor,cantidad y series segun sucripcion item 3.2
            $proveedor = $_POST["proveedor"];
            $query = "qery cualquiera";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $consulta = $result -> fetchAll();
            echo "<h1> $proveedor </h1>";
            ?>
            <Table>
                <tr>
                    <th>Valor</th>
                    <th>Cantidad Peliculas</th>
                    <th>Series</th>
                </tr>
                <?php 
                    foreach($consulta as $info) {
                        echo "<tr><td>$info[0]</td><td>$info[1]</td><td>$info[2]</td></tr>";
                    }
                ?>
            </Table>
        </div>
    </div>    
    </main>         
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>