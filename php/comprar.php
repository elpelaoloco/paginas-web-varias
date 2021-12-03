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
                
        </nav>
    </header>
    <main class="container" id="main-content">
        <div class="row">
            <h1 id="inicio" class="d-flex justify-content-center">Epic Prime</h1>
            <h2 id ="texto" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 d-flex justify-content-center"> Tienda</h2>  
            <?php 
            #buscar solo titulos distintos
            $query = "qery cualquiera";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $consulta = $result -> fetchAll();
            $contador = 0;
            foreach ($consulta as $item) {
                echo "<div class'dropdown'>
                <button class='btn btn-dark dropdown-toggle' type='button' id='dropdownMenuButton$contador[0]' data-bs-toggle='dropdown' aria-expanded='false'>
                  Dropdown button
                </button>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton$contador[0]'>";
                #query para buscar proveedores y precios del $item[0] que se supone que debe ser el titulo
                $pregunta = "qery cualquiera";
                $resultados = $db2 -> prepare($pregunta);
                $resultados -> execute();
                $finales = $result -> fetchAll();
                foreach ($item as $subitem){}
                #subitems deberian ser los proveedores

                    echo "<form action='tienda.php' method='post'>
                            <input type='submit' value = '$subitem[0]'>
                        </form>
                     </div>
                    </div>";
                }    
                    
                
            }
            ?>
            

        </div>
    </div>    
    </main>         
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>