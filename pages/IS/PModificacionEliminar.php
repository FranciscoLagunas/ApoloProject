<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/EliminarProyecto.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Apolo</title>
</head>
<body>
	  <div class="container-all">
    <div class="ctn-form">
        <a href="#"><img src="imagenes/a.jpg" alt="" class="logo"></a>
                <h1 class="title">Estos son los proyectos que creaste</h1>
            

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

if ($Estado == "Desarrollo" || $Estado == "Finalizado") {
	print("<h1 class=\"title\">Debido a que el estado del proyecto es: $Estado</h1>");
	print("<h2 class=\"title\">No se puede borrar</h2>");
	 print("<div class=\"container-all\">");
    print("<div class=\"ctn-form\">");

	print("<form name='form1' method='POST' action='HInicioCreador.php'>		
			<input type='submit' name='Aceptar' value='Aceptar'/>
			</form>");

}
else
{
	if (isset($_POST['ProyectoI'])) {
	$Proyecto = $_POST['ProyectoI'];
	/*<!-- VAMOS A BORRAR UNOS CUANTOS PROYECTOS :D -->*/
	 print("<div class=\"container-all\">");
    print("<div class=\"ctn-form\">");
	print("<form name='form1' method='POST' action='PModificacionEliminar.php'>");
			print("<h1 class=\"title\">¿Desea borrar el proyecto?</h1>");	
			print("<h3 class=\"title\">No podra volver a recuperarlo</h3>");
			print("<input type='text' name='Proyecto' value='$Proyecto' hidden/>");
			print("<p>");
			print("<input type='radio' name='Accion' value='Si'>Si<br>");
			print("</p>");
			print("<input type='radio' name='Accion' value='No'>No<br>");
			print("<input type='submit' name='confirmar' value='Confirmar'/>");

	
	}

	if (isset($_POST['confirmar']) && isset($_POST['Accion'])) {
		$Accion = $_POST['Accion'];
		$Proyecto = $_POST['Proyecto'];		
		if ($Accion == 'Si') {

			include("Conexion.php");	
			$Con = Conectar();

			$SQLConsulta = "SELECT * FROM solicitudes where IdProyecto = '$Proyecto';";
			$queryConsulta = EjecutaConsulta($Con,$SQLConsulta);
			$n = mysqli_num_rows($queryConsulta);

			//ACTUALIZAMOS A LAS PERSONAS CON UNA POSIBILIDAD DE SOLICITAR UNA VEZ MAS
			if ($n>=1) {
				for ($z=0; $z <= ($n-1); $z++) { 
					$Filas = mysqli_fetch_row($queryConsulta);
					print_r($Filas);
					$Actualizacion = $Filas[3] -1;
					$SQLActu = "UPDATE SOLICITUDES SET Intentos = '$Actualizacion' WHERE IdInformacion = '$Filas[2]'";
					EjecutaConsulta($Con,$SQLActu);

					$SQLQuitarC = "DELETE FROM SOLICITUDES WHERE IdSolicitud = '$Filas[0]'";
					EjecutaConsulta($Con,$SQLQuitarC);
				}
			}			

			$SQLConsultaRoles = "DELETE FROM rolpersonasproyecto WHERE IdProyecto = '$Proyecto';";
			EjecutaConsulta($Con,$SQLConsultaRoles);
			$SQLCantidadBorrar = "DELETE FROM cantidad Where IdProyecto = '$Proyecto';";
			EjecutaConsulta($Con,$SQLCantidadBorrar);
			$SQLBorrar= "DELETE from Proyectos Where IdProyecto = '$Proyecto';";
			EjecutaConsulta($Con,$SQLBorrar);
			
			print("<div class=\"container-all\">");
    		print("<div class=\"ctn-form\">");
			print("<h1 class=\"title\">Proyecto eliminado</h1>");
			
			print("<form name='form1' method='POST' action='HInicioCreador.php'>		
			<input type='submit' name='Aceptar' value='Aceptar'/>
			</form>");
			print("</div>");
		print("</div>");	
		}
		else
		{
			header("Location:HInicioCreador.php");
		}		
	}
}
?>