<?php 
include("sesionActivada.php");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>SISTITULOS</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="jscss/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="jscss/bootstrap/css/bootstrap-theme.min.css" />
    
    <script src="jscss/jquery.js"></script>
    <script src="jscss/bootstrap/js/bootstrap.min.js"></script>
    
  
    <script type="text/javascript" src="lib/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="lib/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="lib/select2.min.js"></script>
    <link href="lib/select2.min.css" rel="stylesheet" />
    <link href="lib/jquery.dataTables.min.css" rel="stylesheet" />

</head>

<body>
  <br>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SiSTitulos</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li ><a href="index.php">Inicio <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="institucion_listado.php">Institucion</a></li>
                            <li><a href="titulo_listado.php">Titulo</a></li>
                            <li><a href="persona_listado.php">Persona</a></li>
                                                    </ul>
                    </li>
                    <li ><a href="titulado_listado.php">Titulado</a></li>
                    <li ><a href="consulta_titulos.php" target="_blank">SiSTitulos</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><?php echo "Bienvenido ".$nombre ?></a></li>
                    <li><a href="logout.php">Salir</a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        
