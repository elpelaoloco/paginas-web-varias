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
                <a id="registro" class= "btn btn-dark pull-left d-flex nav-item justify-content-end" href="../cuenta.php">
                    &laquo; Volver

                </a>     
            </div>
        </nav>
    </header>
    <br>
<h1 align="center" class='text-white d-flex justify-content-center'>Filtrador por Géneros</h1>


<h3 align="center" class='text-white d-flex justify-content-center'>Peliculas</h3>
    <?php

    $result1 = $db2 -> prepare("SELECT DISTINCT genero FROM genero_p;");
    $result1 -> execute();
    $dataCollected1 = $result1 -> fetchAll();
    ?>

    <form align="center" action="../php/consulta_1.php" method="post">
    <p style="color: white";>Seleccionar un Género:</p>
      <select name="tipo">
        <?php

        foreach ($dataCollected1 as $d1) {
          echo "<option value=$d1[0]>$d1[0]</option>";
        }
        ?>
      </select>
      <br><br>
      <input type="submit" class="btn btn-dark" value="Buscar">
  </form>
  <h3 align="center" class='text-white d-flex justify-content-center'>Series</h3>
    <?php
    $result2 = $db2 -> prepare("SELECT DISTINCT genero FROM genero_s;");
    $result2 -> execute();
    $dataCollected2 = $result2 -> fetchAll();
    ?>

    <form align="center" action="../php/consulta_2.php" method="post">
    <p style="color: white";>Seleccionar un Género:</p>
      <select name="tipo">
        <?php
        #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
        foreach ($dataCollected2 as $d2) {
          echo "<option value=$d2[0]>$d2[0]</option>";
        }
        ?>
      </select>
      <br><br>
      <input type="submit" class="btn btn-dark" value="Buscar">
  </form>
  <h3 align="center" class='text-white d-flex justify-content-center'>Videojuegos</h3>
    <?php
    #Primero obtenemos todos los tipos de pokemones
    $result3 = $db -> prepare("SELECT DISTINCT genero FROM videojuegos");
    $result3 -> execute();
    $dataCollected3 = $result3 -> fetchAll();
    ?>

    <form align="center" action="../php/consulta_3.php" method="post">
    <p style="color: white";>Seleccionar un Género:</p>
      <select name="tipo">
        <?php
        #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
        foreach ($dataCollected3 as $d3) {
          echo "<option value=$d3[0]>$d3[0]</option>";
        }
        ?>
      </select>
      <br><br>
      <input type="submit" class="btn btn-dark" value="Buscar">
  </form>
  </body>



</html>
