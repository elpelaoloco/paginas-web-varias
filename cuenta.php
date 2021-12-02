
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
            <h2 class="text-white d-flex justify-content-start">Bienvenido --insertar nombre-- !!!!!!</h2>
            <h1 class="text-center d-flex justify-content-center text-white">Elige tu Proveedor De Streaming</h1>
            <h3 class="text-center d-flex justify-content-center text-white"> Haz click para ver</h3>
            <a  href="#contenedor" class="center-con">
                <div class="round">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </div>
    </div>
        <!--  sistema de cards -->
    <div class="row" id="contenedor">
        <div class="col-lg-3" margin id="card-container">
            <div class="card" style="width: 18rem;">
                <img src="/proveedores/Netflix.png" class="card-img-top" alt="...">
                <div class="card-body text-white bg-secondary">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>  
        </div>
        <div class=" col-lg-3" id="card-container">
            <div class="card" style="width: 18rem;">
                <img src="proveedores/crunchyroll-1000x600.png" class="card-img-top" alt="...">
                <div class="card-body text-white bg-secondary">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>  
        </div>
        <div class=" col-lg-3" id="card-container">
            <div class="card" style="width: 18rem;">
                <img src="proveedores/Prime Video.jpg" class="card-img-top" alt="...">
                <div class="card-body text-white bg-secondary">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>  
        </div>
        <div class=" col-lg-3" id="card-container">
            <div class="card" style="width: 18rem;">
                <img src="proveedores/funimation.jpg" class="card-img-top" alt="...">
                <div class="card-body text-white bg-secondary">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>  
        </div>
    </div>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>