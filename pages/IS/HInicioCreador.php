<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Apolo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style/HInicioCreador.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpeg" sizes="32x32"  href="imagenes/favicon.jpeg">
</head>
<body>

	<ul>
        <li>
            <a href="PModificarInformacion.php" name="sesionDestroy">
                <div class="icon">   
                  
                   <i class="fa fa-user-o" aria-hidden="true"></i>
                   <i class="fa fa-user-o" aria-hidden="true"></i>

                </div>
                <div class="name"><span data-text="Editar Perfil">Editar Perfil</span></div>
            </a>
        </li>
        <li>
            <a href="HCrearProyectos.php" name="sesionDestroy">
                <div class="icon">
                	  <i class="fa fa-id-card-o" aria-hidden="true"></i>
                   <i class="fa fa-id-card-o" aria-hidden="true"></i>
                </div>
                <div class="name"><span data-text="Crear Proyecto">Crear Proyecto</span></div>
            </a>
        </li>
         <li>
            <a href="HMisProyectos.php" name="sesionDestroy">
                <div class="icon">
                	   <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                	   <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                </div>
                <div class="name"><span data-text="Mis Proyecto">Mis Proyectos</span></div>
            </a>
        </li>
         <li>
            <a href="destruir.php" name="sesionDestroy">
                <div class="icon">
                	    	<i class="fa fa-power-off" aria-hidden="true"></i>
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                </div>
                <div class="name"><span data-text="Cerrar Sesión">Cerrar Sesión</span></div>
            </a>
        </li>
    </ul>

    	<div class="container1">
		<div class="title1">APOLO</div>
		<div class="subtitle1">El Poryecto de Proyectos</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="JavaScript/HCreador.js"></script>

</html>

