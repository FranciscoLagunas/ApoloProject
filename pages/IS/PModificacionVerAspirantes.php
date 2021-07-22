<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Apolo</title>
	<link rel="stylesheet" href="style/VerAspirantes.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}
$Usuario = $_SESSION['username'];
$Proyecto = $_POST['ProyectoI'];

include("Conexion.php");	
$Con = Conectar();


 			


print("<div class=\"container-all\">");
print("<div class=\"ctn-form\">");
print("<img src='imagenes/a.jpg' alt='' class=\"logo\">");
print("<h1 class=\"title\">Aqui est la lista de asapirantes a tu Poryecto</h1>");
print("<label>Elija a sus colaboradores</label><br>");
print("<table>");
print("<tr>");
print("<td>Nombre</td>");
print("<td>Apellidos</td>");
print("<td>Telefono</td>");
print("<td>Carrera</td>");
print("<td>Sexo</td>");
print("<td>Area Interes</td>");
print("<td>Restantes</td>");
print("<td>Aceptar</td>");
print("<td>Rechazar</td>");
print("</tr>");

//CANTIDAD DE SOLICITUDES HACIA EL PROYECTO
	$SQLSolicitudes = "SELECT * FROM solicitudes WHERE IdProyecto = '$Proyecto';";
	$QuerySolicitudes = EjecutaConsulta($Con,$SQLSolicitudes);
	$n = mysqli_num_rows($QuerySolicitudes);


for ($DC=0; $DC <= ($n-1); $DC++) { 
	$Filas = mysqli_fetch_row($QuerySolicitudes);
	//Informacion de la persona
	$SQLPersona= "SELECT * FROM Informacion WHERE IdInformacion = '$Filas[2]';";
	$QueryPersonas = EjecutaConsulta($Con,$SQLPersona);
	$FilaInfoPersonal = mysqli_fetch_row($QueryPersonas);
	//Cantidad
	$AHORALOSrestantes= "SELECT * FROM cantidad WHERE IdProyecto = '$Proyecto' && IdCantidadArea ='$Filas[4]';";
	$QueryRestantes = EjecutaConsulta($Con,$AHORALOSrestantes);
	$FilaRestantes = mysqli_fetch_row($QueryRestantes);
	
	
	//CUAL ES EL NOMBRE DEL AREA
	$AhoraEL = "SELECT * FROM Categorias WHERE idCategoria = '$FilaRestantes[2]';";
	$QueryAhoraSI = EjecutaConsulta($Con,$AhoraEL);
	$FilaAhoraSi = mysqli_fetch_row($QueryAhoraSI);

	//NOMBRE AREA DE INTERES
	$AreaInteres= "SELECT Nombre FROM Categorias WHERE idCategoria = '$FilaInfoPersonal[1]';";
	$QueryNombre = EjecutaConsulta($Con,$AreaInteres);
	$FilaDIC = mysqli_fetch_row($QueryNombre);

	print("<tr>");
	print("<td>$FilaInfoPersonal[2]</td>");
	print("<td>$FilaInfoPersonal[3]</td>");
	print("<td>$FilaInfoPersonal[5]</td>");
	print("<td>$FilaInfoPersonal[6]</td>");
	print("<td>$FilaInfoPersonal[7]</td>");
	print("<td>$FilaDIC[0]</td>");
	print("<td>$FilaRestantes[4]</td>");

	print("<td><form method='POST' action='PModificacionVerAspirantes.php'>
		<input type='text' name='Antes' value='$FilaRestantes[2]' hidden/>
		<input type='text' name='Restantes' value='$FilaRestantes[4]' hidden/>
		<input type='text' name='Persona' value='$FilaInfoPersonal[0]' hidden/>
		<input type='text' name='ProyectoI' value='$Proyecto' hidden/>
    	<input type='submit' name='Accion' value='Aceptar'/>
		</form></td>");
	print("<td><form method='POST' action='PModificacionVerAspirantes.php'>
		<input type='text' name='Persona' value='$FilaInfoPersonal[0]' hidden/>
		<input type='text' name='ProyectoI' value='$Proyecto' hidden/>
    	<input type='submit' name='Accion' value='Rechazar'/>
		</form></td>");
	print("</tr>");
}
print("</table>");

if (isset($_POST['Accion'])) {
	$Persona = $_POST['Persona'];
	$Accion = $_POST['Accion'];
	$Proyecto = $_POST['ProyectoI'];

	if ($Accion == "Aceptar") {
		$Antes = $_POST['Antes'];
		$Restantes = $_POST['Restantes'];
		$InsertarVV = $Restantes - 1;	
		//MODIFICAR RESTATES Y CUANDO LLEGUE A 0 YA NO MOSTRAR EL BOTON DE ACEPTAR
		$SQLRestarD = "UPDATE cantidad SET restantes = '$InsertarVV' WHERE IdProyecto = '$Proyecto'  && AreaSolicitada = '$Antes';";
		EjecutaConsulta($Con,$SQLRestarD);
		//CAMBIAR A QUE EL PERFIL TENGA UN ROL EN EL PROYECTO
		$RolProyecto = "INSERT INTO rolPersonasProyecto(IdInformacion, IdProyecto, Rol) VALUES ($Persona, $Proyecto,'Aceptado');";
		EjecutaConsulta($Con,$RolProyecto);
	}elseif ($Accion == "Rechazar") {
		//RESTARLE UN POSIBLE ENVIO DE SOLICITUD EN SU PERFIL
		$SQLCv = "SELECT * FROM SOLICITUDES where IdInformacion = '$Persona';";
		$queryCv = EjecutaConsulta($Con,$SQLCv);
		$FilaCv = mysqli_fetch_row($queryCv);
		$Actualizacion = $FilaCv[3] -1;
		$SQLActu = "UPDATE SOLICITUDES SET Intentos = '$Actualizacion' WHERE IdInformacion = '$Persona'";
		EjecutaConsulta($Con,$SQLActu);
		//BORRAR LA SOLICITUD
		$SQLO = "DELETE FROM SOLICITUD WHERE IdSolicitud = '$FilaCv[0]';";
	}
}
?>