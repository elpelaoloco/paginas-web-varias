<?php
session_start();
require("../php/conexion.php");

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
    echo "Cambio de Contraseña Realizado";
}

if (strval($antigua_contraseña) <> $password_real) {    
    echo "No se logro completar el Cambio de Contraseña: Contraseña Incorrecta";
}



?>
<br>
<br>
<form action="infor_personal.php" method="get">
    <input type="submit" value="Volver a la Información Personal">
</form>
</body>

</html>