<?php 
$usuario = $_POST["email"];
$contraseña = $_POST["contraseña"];
session_start();
require("config/conexion.php");
/* ahora viene una query cualquiera vulnerable a inyection   */
$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
$result = $db => prepare($query);
$result => execute();
$consulta = $result => fetchAll();
if (pg_num_rows($consulta) <> 0) {
    <?php <h1 class = "malo"> Error en los datos</h1> ?>
};
?>