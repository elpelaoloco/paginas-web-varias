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
                <a id="registro" class= "btn btn-dark pull-left d-flex nav-item justify-content-end" href="../php/infor_personal.php">
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

 	$query2 = "SELECT DISTINCT proveedor.nombre, fecha_inicio FROM usuarios, proveedor, subscripciones, subs_por_pro, pagos_subs WHERE 
     pagos_subs.uid = usuarios.id AND subscripciones.id = subs_por_pro.subs_id
     AND subs_por_pro.pro_id = proveedor.pro_id AND usuarios.id = 1 AND pagos_subs.subs_id = subscripciones.id 
     AND estado = 'activa' ORDER BY fecha_inicio";

	$result2 = $db2 -> prepare($query2);
	$result2 -> execute();
	$multimedias = $result2 -> fetchAll();
?>
<br/><br/>

<?php 
    echo "<h1 class='text-white d-flex justify-content-center'> Proveedores con Suscripción Activa según Fecha: </h1>";
        foreach($multimedias as $multimedia) {
            echo "<h1 class='text-white d-flex justify-content-center'> $multimedia[0] </h1>";
        }
    ?>

    </body>
    </html>
