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
                <a id="registro" class= "btn btn-dark pull-left d-flex nav-item justify-content-end" href="../php/cambio_contraseña.php">
                    &laquo; Volver

                </a>     
            </div>
        </nav>
    </header>
    
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
</body>
<br/><br/>
<br/><br/>

<?php 
$antigua_contraseña = $_POST["Contraseña_Antigua"];
$nueva_contraseña = $_POST["Nueva_Contraseña"];

$correo = $_SESSION["email"];
$contraseña = $_SESSION["contraseña"];

$query = "SELECT * FROM usuarios_test WHERE mail = '$correo'";
$result = $db -> prepare($query);
$result -> execute();
$consulta = $result -> fetchAll();

foreach ($consulta as $consulta1) {
    $password_real = $consulta1[3];
}


if (strval($antigua_contraseña) == $password_real) {    
    $query = "UPDATE usuarios_test SET password = '$nueva_contraseña' WHERE mail = '$correo'";
    $result = $db -> prepare($query);
    $result -> execute();
    $consulta = $result -> fetchAll();

    $_SESSION["contraseña"] = $nueva_contraseña;
    echo "<h1 class='text-white d-flex justify-content-center'> Cambio de Contraseña Realizado </h1>";
}

if (strval($antigua_contraseña) <> $password_real) {    
    echo "<h1 class='text-white d-flex justify-content-center'> No se logro completar el Cambio de Contraseña: Contraseña Incorrecta </h1>";
}



?>
<br>
<br>
</body>

</html>