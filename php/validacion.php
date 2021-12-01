
<body>

<?php 
require("../php/conexion.php");

$usuario = $_POST["email"];
$contraseña = $_POST["contraseña"];

/*session_start();
/* ahora viene una query cualquiera vulnerable a inyection   */

/* usuarios_test debe cambiarse en la versión final por usuarios (es la base de usuarios de 43) */
/* Por lo mismo, db, debe cambiarse en la versión final por db2 (es la base de usuarios de 43) */

$query = "SELECT * FROM usuarios_test WHERE mail = '$usuario' AND password = '$contraseña'";
$result = $db -> prepare($query);
$result -> execute();
$consulta = $result -> fetchAll();

$rows = count($consulta);

/* La idea es que acá diriga a una página de error más bonita */ 
if ($rows == 0) {
    echo "No existe usuario en la base de datos";
}

/* La idea es que acá diriga al menú */ 
if ($rows == 1) {    
    echo "Sí existe usuario en la base de datos";
}

?>

