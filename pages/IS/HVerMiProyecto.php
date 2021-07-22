<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}
$Usuario = $_SESSION['username'];
$Proyecto = $_POST['ProyectoI'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mi Proyecto</title>
	<link rel="stylesheet" href="style/VerMiproyecto.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpeg" sizes="32x32"  href="imagenes/favicon.jpeg">
</head>
<body>
	<ul>
        <li>
            <a href="HInicioCreador.php" name="sesionDestroy">
                <div class="icon">
                

                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <i class="fa fa-bars" aria-hidden="true"></i>

                </div>
                <div class="name"><span data-text="Menu">Menu</span></div>
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
</body>
</html>

<?php


include("Conexion.php");	
$Con = Conectar();

$SQL = "SELECT * FROM proyectos where IdProyecto = '$Proyecto';";
$query = EjecutaConsulta($Con,$SQL);
$Fila = mysqli_fetch_row($query);

$SQLR = "SELECT * FROM cantidad where IdProyecto = '$Proyecto';";
$queryR = EjecutaConsulta($Con,$SQLR);
$FilaR = mysqli_fetch_row($queryR);
print("<div class=\"container-all\">");
print("<div class=\"ctn-form\">");
print("<img src='imagenes/a.jpg' alt='' class=\"logo\">");
print("<h1 class=\"title\">Detalles de tu Proyecto</h1>");
print("<form name='form1' method='POST' action='PModificacionVerAspirantes.php'>
		<input type='text' name='ProyectoI' value='$Proyecto' hidden/>
		<input type='submit' name='Ver' value='Ver Aspirantes'/>
	</form>");

if($Fila[9] == "Solicitando" || $Fila[9] == "Desarrollo" ){
print("<form name='form1' method='POST' action='PCambiarEstado.php'>
		<input type='text' name='Estado' value='$Fila[9]' hidden/>
		<input type='text' name='ProyectoI' value='$Proyecto' hidden/>
		<input type='submit' name='Cambiar' value='Cambiar Estado'/>
	</form>");}else
{
	print("<h1  class=\"title\">Este proyecto ha finzalizado</h1>");
}

print("<form name='form1' method='POST' action='PModificacionEliminar.php'>
		<input type='text' name='Estado' value='$Fila[9]' hidden/>
		<input type='text' name='ProyectoI' value='$Proyecto' hidden/>
		<input type='submit' name='Eliminar' value='Eliminar proyecto'/>
	</form>");


print("<div>");
print("<h1  class=\"title\">Nombre del proyecto: $Fila[3]</h1>");
print("<h3  class=\"title\">Estado: $Fila[9]</h3>");
print("<h3  class=\"title\">Fecha de publicación: $Fila[6]</h3>");
print("<h3  class=\"title\">Fecha de Inicio: $Fila[7]</h3>");
print("<h2  class=\"title\">Descripción: $Fila[5]</h2>");
print("</div>");
?>