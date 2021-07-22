<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Apolo</title>
	<link rel="stylesheet" href="style/CambiarEstado.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	
</body>
</html>
<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}
$Usuario = $_SESSION['username'];

if (isset($_POST['Estado'])) {
	$Estado = $_POST['Estado'];
}else
{
	$Estado = "Otre";
}

if ($Estado == "Solicitando") {
	if (isset($_POST['ProyectoI'])) {
	$Proyecto = $_POST['ProyectoI'];
	}
	print("<div class=\"container-all\">");
print("<div class=\"ctn-form\">");
print("<img src='imagenes/a.jpg' alt='' class=\"logo\">");
	print("<h1 class=\"title\">El estado del proyecto es: $Estado</h1>");
	print("<h1 class=\"title\">Solo puede cambiar el estado a en Desarrollo</h1>");
	print("<form name='form1' method='POST' action='PCambiarEstado.php'>
		<input type='text' name='Proyecto' value='$Proyecto' hidden/>	
		<input type='text' name='Cambio' value='Desarrollo' hidden/>
		<input type='submit' name='Accion' value='Aceptar'/>
		</form>");

	print("<div class=\"container-all\">");
	print("<div class=\"ctn-form\">");

	print("<form name='form1' method='POST' action='PCambiarEstado.php'>		
			<input type='submit' name='Accion' value='Rechazar'/>
			</form>");
		print("</div>");
	print("</div>");

}

if ($Estado == "Desarrollo") {
	if (isset($_POST['ProyectoI'])) {
	$Proyecto = $_POST['ProyectoI'];
	}
	print("<div class=\"container-all\">");
	print("<div class=\"ctn-form\">");

	print("<h1 class=\"title\">El estado del proyecto es: $Estado</h1>");
	print("<h1 class=\"title\">Solo puede cambiar el estado a Finalizado</h1>");
	print("<form name='form1' method='POST' action='PCambiarEstado.php'>
		<input type='text' name='Proyecto' value='$Proyecto' hidden/>	
		<input type='text' name='Cambio' value='Finalizado' hidden/>
		<input type='submit' name='Accion' value='Aceptar'/>
		</form>");
		

	print("<div class=\"container-all\">");
	print("<div class=\"ctn-form\">");
	print("<form name='form1' method='POST' action='PCambiarEstado.php'>		
			<input type='submit' name='Accion' value='Rechazar'/>
			</form>");
		
}

if (isset($_POST['Accion'])) {
	$Proyecto = $_POST['Proyecto'];
	$Accion = $_POST['Accion'];
	$Cambio = $_POST['Cambio'];
	if ($Accion == "Aceptar") {
		include("Conexion.php");	
		$Con = Conectar();
		$SQLActu = "UPDATE Proyectos SET Estado = '$Cambio' WHERE IdProyecto = '$Proyecto';";
		EjecutaConsulta($Con,$SQLActu);
		print("<div class=\"container-all\">");
		print("<div class=\"ctn-form\">");

		print("<h1 class=\"title\">Cambio realizado<h2>");
		print("<form name='form1' method='POST' action='HInicioCreador.php'>		
			<input type='submit' name='Aceptar' value='Aceptar'/>
			</form>");
			print("</div>");
	print("</div>");
	}
	else
		header("Location:HInicioCreador.php");
}
?>