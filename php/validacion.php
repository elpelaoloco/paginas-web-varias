<?php session_start();
require("../php/conexion.php");

$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

/*session_start();
/* ahora viene una query cualquiera vulnerable a inyection   */

/* usuarios_test debe cambiarse en la versión final por usuarios (es la base de usuarios de 43) */
/* Por lo mismo, db, debe cambiarse en la versión final por db2 (es la base de usuarios de 43) */

$query = "SELECT * FROM usuarios_test WHERE mail = '$usuario' AND password = '$contraseña'";
$result = $db2 -> prepare($query);
$result -> execute();
$consulta = $result -> fetchAll();





$rows = count($consulta);
/* La idea es que acá diriga a una página de error más bonita */ 
if ($rows == 0) {
    $_SESSION["error"] = 404;
    header("Location: " . '../error.php');
    /*echo "No existe usuaro en la base de datos"; */
}

/* La idea es que acá diriga al menú */ 
/*  se deberia hacer un for i in consulta para dejar asginadas las variables a la session*/
elseif ($rows == 1) {    
    $_SESSION["mail"] = $usuario;
    $_SESSION["contraseña"] = $contraseña;
    header("Location: " . '../cuenta.php');
    /* echo "Sí existe usuario en la base de datos"; */
}

?>

