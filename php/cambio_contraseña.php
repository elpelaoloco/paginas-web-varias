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
</body>


<?php 
            $correo = $_SESSION["email"];
            $contraseña = $_SESSION["contraseña"];
            $query = "SELECT * FROM copy_copy WHERE mail = '$correo' AND password = '$contraseña'";
            $result = $db -> prepare($query);
            $result -> execute();
            $consulta = $result -> fetchAll();


            ?>
            <br/><br/>
<form align="center" action="../php/cambio_contraseña2.php" method="post">
<p style="color: white";>Contraseña Antigua:</p>
  <input type="text" name="Contraseña_Antigua">
  <br/><br/>
  <p style="color: white";>Nueva Contraseña:</p>
  <input type="text" name="Nueva_Contraseña">
  <br/><br/>
  <input type="submit" class="btn btn-dark" value="Cambiar Contraseña">
</form>

</html>