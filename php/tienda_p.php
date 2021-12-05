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
                    <a id = "imagen" href="index.php">
                        <div id ="logo-image" alt = "logo" class="pull-left visible-lg visible-md visible-sm"></div>
                    </a>   
                </div>
                <a id="registro" class= "btn btn-dark pull-left d-flex nav-item justify-content-end" href="comprar.php">
                    &laquo; Volver

                </a>
                
        </nav>
    </header>

    <main class="container" id="main-content">
        <div class="row">
            <h1 id="inicio" class="d-flex justify-content-center">Epic Prime</h1>
            <h2 id ="texto" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 d-flex justify-content-center"> Tienda</h2> 
            <?php
            $tipo = $_POST["tipo"];

            $result = $db2 -> prepare("SELECT DISTINCT proveedor.nombre, peliculas_en_arriendo.precio FROM proveedor, 
            peliculas_en_arriendo WHERE proveedor.pro_id=peliculas_en_arriendo.pro_id AND peliculas_en_arriendo.pid = $tipo");
            $result -> execute();
            $dataCollected = $result -> fetchAll();
            ?>

            <form align="center" action="tienda.php" method="post">
            <p style="color: white";>Seleccionar un Género:</p>
            <select name="tipo">
                <?php
                #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
                foreach ($dataCollected as $d) {
                echo "<option value='$tipo, $d[0], $d[1]'>$d[0]($$d[1])</option>";
                }
                ?>
            </select>
            <br><br>
            <input type="submit" class="btn btn-dark" value="Comprar">
        </form> 
            

        </div> 
    </div>    
    </main>  
    <script src="../js/popper.min.js"></script>       
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>