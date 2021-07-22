<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Apolo</title>
	<link rel="stylesheet" href="style/CrearProyectos.css">

</head>
<body>
	
</body>
<script src="JavaScript/CrearProyectos.js"></script>
</html>
<?php
session_start();
if($_SESSION['validacion'])
{}else{header("Location:Login.html");}

$Usuario = $_SESSION['username'];

$Nombre = $_REQUEST['Nombre'];
$DescripcionBreve = $_REQUEST['DescripcionBreve'];
$Descripcion = $_REQUEST['Descripcion'];
$FechaInicio = $_REQUEST['FechaInicio'];
$Duracion = $_REQUEST['Duracion'];
$Area = $_REQUEST['Area'];
$AreasSolicitadas = $_REQUEST['AreasSolicitadas'];
$tamanio = (sizeof($AreasSolicitadas)-1);
$FechaPublicacion = date('Y-m-d');

include("Conexion.php");	
$Con = Conectar();
//Insertamos el proyecto
$SQL = "INSERT INTO Proyectos(creador,AreaPrincipal,Nombre,Descripcion,DescripcionBreve,FechaPublicacion,FechaInicio,Duracion,Estado) VALUES('$Usuario','$Area','$Nombre','$Descripcion','$DescripcionBreve', '$FechaPublicacion','$FechaInicio','$Duracion','Solicitando');";
	EjecutaConsulta($Con,$SQL);
//BUSCAMOS EL PROYECTO PARA INSERTAR LA CANTIDAD DE PERSONAL SOLICITADO
$SQLB = "SELECT * FROM proyectos where creador = '$Usuario' && Nombre = '$Nombre' && FechaPublicacion = '$FechaPublicacion' && Duracion = '$Duracion';";
$queryB = EjecutaConsulta($Con,$SQLB);
$FilaB = mysqli_fetch_row($queryB);

//Solicitamos la cantidad de personas en cada area
    print("<div class=\"container-all\">");
        print("<div class=\"ctn-form\">");
print("<form name='form1' method='POST' action='PCantidadPersonal.php'>");
print("<h1 class=\"title\">Ingrese la cantidad de personas necesitadas para cada area</h1>");
print("<h1 class=\"title\">El personal solicitado es:</h1>");	
	print("<label>Area Solicitada</label>");
	print("<label>Seleecione el numero de Solicitados</label>");

	for ($a=0; $a <= $tamanio ; $a++) 
	{ 
		$SQL1 = "SELECT * FROM categorias Where IdCategoria = '$AreasSolicitadas[$a]'";		
		$query2 = EjecutaConsulta($Con,$SQL1);
		$Fila = mysqli_fetch_row($query2);	
		
		print("<input type='text' name='AreasSolicitadas[]' value='$Fila[0]' hidden/> ");
		print("<label>$Fila[1]</label>");

		print("<input  class=\"select-css\" type='number' min='0' value='1' name='Cantidad[]' required>");
		

	}
	//Enviar el id del proyecto
	print("<input type='text' name='ProyectoId' value='$FilaB[0]' hidden/> ");
	print("<input type='submit'value='Aceptar'/>");	
	
print("</form>");

    print("</div>");
        print("</div>");
?>