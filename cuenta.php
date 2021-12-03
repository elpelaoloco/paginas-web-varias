<?php session_start();?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-2.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>  
    <header> <!-- Header-->
    <nav id="header-nav" class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <div class = "navbar-header">
                    <a id = "imagen" href="index.html">
                        <div id ="logo-image" alt = "logo" class="pull-left visible-lg visible-md visible-sm"></div>
                    </a>   
                </div>
                <div class="dropdown">
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Cuenta
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Informacion Personal</a></li>
                      <li><a class="dropdown-item" href="#">Suscripciones Activas</a></li>
                      <li><a class="dropdown-item" href="#">Horas Acvtivas</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id = "fondo">
        <div>
            <h2 class="text-white d-flex justify-content-start">Bienvenido <?php echo $_SESSION["mail"]?>!!!!!!</h2>
            <h1 class="text-center d-flex justify-content-center text-white">Elige tu Proveedor De Streaming</h1>
            <h3 class="text-center d-flex justify-content-center text-white"> Haz click para ver</h3>
            <form action="" method="get">
                <label for="">Proveedor</label><br>
                <input type="text">
                <label for="">Nombre</label><br>
                <input type="text">
                <button  type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <a  href="#Botones" class="center-con">
                <div class="round">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </div>
    </div>
    <div class= "form-check">
        <form method="post" action="">
            <?php 
            $query = "SELECT DISTINCT proveedores.nombre FROM proveedores";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $consulta = $result -> fetchAll();
            foreach ($consulta as $proveedor) {
                echo "<input  value= $proveedor[0] class = 'form-check-input'type= 'radio' name = 'proveedor'><br> <label class = 'form-check-label'>$proveedor[0]</label>";
            }
            ?>
            <button type="submit" class = "btn btn-dark">Ver</button>
    </div>
    </form>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>