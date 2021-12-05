

<?php
require("../php/conexion.php");


    /* Inicio de migración de datos desde tabla usuarios par a impar */
    /* prueba debe cambiarse en la versión final por usuarios (es la base de usuarios de 28) */
    $query = "SELECT * FROM pagos_prueba";
    $result = $db -> prepare($query);
    $result -> execute();
    $pagos = $result -> fetchAll();

    foreach ($pagos as $pago) {
        /* copia_usuarios43 debe cambiarse en la versión final por usuarios (es la base de usuarios de 43) */
        $query3 = "SELECT * FROM pagos_prueba WHERE id = $pago[0]";
        $result3 = $db2 -> prepare($query3);
        $result3 -> execute();
        $consulta3 = $result3 -> fetchAll();
        $rows = count($consulta3);

        if ($rows == 0) {
                /* copia_usuarios43 debe cambiarse en la versión final por usuarios (es la base de usuarios de 43) */
            $query2 = "INSERT INTO pagos_prueba VALUES($pago[0], $pago[1], '$pago[2]', $pago[3])";
            $result2 = $db2 -> prepare($query2);
            $result2 -> execute();
            $consulta2 = $result2 -> fetchAll();
        }

  }

die();
/* Fin de migración de datos desde tabla usuarios par a impar */
?>