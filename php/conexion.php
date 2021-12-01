<?php
  try {
    $user = 'grupo28';
    $password = 'grupo28';
    $databaseName = 'grupo28e3';
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");

    $user2 = 'grupo43';
    $password2 = 'grupo43';
    $databaseName2 = 'grupo43e3';
    $db2 = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=5432;user=$user2;password=$password2");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>