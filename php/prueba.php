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

<form align="center" action="../php/cambio_contraseña2.php" method="post">
<p style="color: black";>Contraseña Antigua:</p>
  <input type="text" name="Contraseña_Antigua">
  <br/><br/>
  <p style="color: black";>Nueva Contraseña:</p>
  <input type="text" name="Nueva_Contraseña">
  <br/><br/>
  <input type="submit" value="Cambiar Contraseña">
</form>

</html>