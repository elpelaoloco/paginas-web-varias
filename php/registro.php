<?php session_start();
require("../php/conexion.php");
$nombre = $_POST["name"]; 
$usuario = $_POST["user"];
$mail = $_POST["email"];
$contraseña = $_POST["contraseña"];


/*session_start();
/*require("php/conexion.php");
/* ahora viene una query cualquiera vulnerable a inyection   */

/* usuarios_test debe cambiarse en la versión final por usuarios (es la base de usuarios de 43) */
/* Por lo mismo, db, debe cambiarse en la versión final por db2 (es la base de usuarios de 43) */

$query3 = "SELECT * FROM usuarios_test WHERE mail = '$mail'";
$result3 = $db -> prepare($query3);
$result3 -> execute();
$consulta3 = $result3 -> fetchAll();

$rows = count($consulta3);

/* La idea es que acá diriga al menú */ 


if ($rows == 0) {
    $query = "SELECT id FROM usuarios_test ORDER BY -id LIMIT 1";
    $result = $db -> prepare($query);
    $result -> execute();
    $consulta = $result -> fetchAll();
    $id = $consulta[0];

    $query2 = "INSERT INTO usuarios_test VALUES(($id[0])$num + 1, '$nombre','$mail','$contraseña','$usuario')";
    $result2 = $db -> prepare($query2);
    $result2 -> execute();
    $consulta2 = $result2 -> fetchAll();
    $_SESSION["nombre"] =$nombre;
    $_SESSION["mail"] =$mail;
    $_SESSION["nombre"] =$usuario;
    $_SESSION["contraseña"] =$contraseña;
    header("Location:../cuenta.php");

    echo "Cuenta Creada!!";
}

/* La idea es que acá diriga a una página de error más bonita */ 
if ($rows == 1) {    
    $_SESSION["error"] = "existe";
    header("Location: error.php");
    echo "Ya existe el correo en la base de datos, por lo tanto, no es posible crear la cuenta";
}





?>

