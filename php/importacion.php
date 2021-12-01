
<?php
require("../php/conexion.php");


/* Inicio Cambio de contraseñas tabla impar */
/* Funcion generadora de string aleatorio: https://stackoverflow.com/questions/4356289/php-random-string-generator*/

    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /* copia_usuarios43 debe cambiarse en la versión final por usuarios (es la base de usuarios de 43) */
    $query = "SELECT * FROM copia_usuarios43";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $users = $result -> fetchAll();

    foreach ($users as $user) {
        $nueva_pass = generateRandomString(8);
        $query2 = "UPDATE copia_usuarios43 SET password = '$nueva_pass' WHERE id = $user[0]";
        $result2 = $db2 -> prepare($query2);
        $result2 -> execute();
        $consulta2 = $result2 -> fetchAll();
    }

    /* Cambio contraseña tabla par completado */

    /* Inicio de migración de datos desde tabla usuarios par a impar */
    /* prueba debe cambiarse en la versión final por usuarios (es la base de usuarios de 28) */
    $query = "SELECT * FROM prueba";
    $result = $db -> prepare($query);
    $result -> execute();
    $users = $result -> fetchAll();

    foreach ($users as $user) {
        /* copia_usuarios43 debe cambiarse en la versión final por usuarios (es la base de usuarios de 43) */
        $query3 = "SELECT * FROM copia_usuarios43 WHERE id = $user[0]";
        $result3 = $db2 -> prepare($query3);
        $result3 -> execute();
        $consulta3 = $result3 -> fetchAll();
        $rows = count($consulta3);
        echo $rows;

        if ($rows == 0) {
                /* copia_usuarios43 debe cambiarse en la versión final por usuarios (es la base de usuarios de 43) */
            $query2 = "INSERT INTO copia_usuarios43 VALUES($user[0], '$user[1]', '$user[2]', '$user[3]', '$user[4]')";
            $result2 = $db2 -> prepare($query2);
            $result2 -> execute();
            $consulta2 = $result2 -> fetchAll();
        }

  }
    header("Location:/home/grupo28/Sites/");
    die();
      /* Fin de migración de datos desde tabla usuarios par a impar */



?>