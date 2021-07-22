<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/postularse.css">
	<title>Postularse</title>
</head>
<body>
	
</body>
</html>

<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}
$Usuario = $_SESSION['username'];

//Añadimos el documento de conexion y la funcion conectar
include("Conexion.php");	
$Con = Conectar();

//BOTON A QUE PROYECTO SE HARAN CAMBIOS
$Postulacion = $_POST['PostularseBoton'];


//COMPROBAR QUE NO SE HA POSTULADO A ESTE PROYECTO
$SQLC = "SELECT * FROM SOLICITUDES where IdInformacion = '$Usuario' && IdCantidad ='$Postulacion';";
$queryC = EjecutaConsulta($Con,$SQLC);
$FilaC = mysqli_fetch_row($queryC);
$Cn = mysqli_num_rows($queryC);


if ($Cn >= 1) {
	print("<div class=\"container-all\">");
print("<div class=\"ctn-form\">");
	print("<h1 class=\"title\">Usted ya se ha solicitado participar en este proyecto</h1>");
	print("<form name='form1' method='POST' action='HInicioColaborador.php'>		
			<input type='submit' name='Aceptar' value='Aceptar'/>
			</form>");
		print("</div>");
	print("</div>");

}else
{

	//INSERCION EN TABLA SOLICITUDES
	$SQL = "SELECT * FROM SOLICITUDES where IdInformacion = '$Usuario';";
	$query = EjecutaConsulta($Con,$SQL);
	$Fila = mysqli_fetch_row($query);
	$n = mysqli_num_rows($query);
	if ($n >=1) {
		print_r($Fila);
		$Actualizacion = $Fila[3] +1;
		if ($Fila[3] == 3) {

				$Bloquear = 1;
			}else{
				$Bloquear =0;
			}	
		
	}else
	{
		$Actualizacion = 1;
		$Bloquear = 0;
	}

	//BUSCAR PROYECTO
	$SQLPR = "SELECT * FROM Cantidad where IdCantidadArea = '$Postulacion';";
	$queryPR = EjecutaConsulta($Con,$SQLPR);
	$FilaPR = mysqli_fetch_row($queryPR);
	print_r($FilaPR);

	//ACTUALIZACION DE SOLICITUDES
	$SQLInto = "INSERT INTO SOLICITUDES(IdProyecto,IdInformacion,Intentos,IdCantidad) VALUES('$FilaPR[1]','$Usuario','$Actualizacion','$Postulacion');";
		EjecutaConsulta($Con,$SQLInto);


	if ($Actualizacion >= 1 && $Actualizacion <= 3) {
		//ACTUALIZAMOS LA CANTIDAD DE POSTULACIONES
		$SQLActu = "UPDATE SOLICITUDES SET Intentos = '$Actualizacion' WHERE IdInformacion = '$Usuario'";
		EjecutaConsulta($Con,$SQLActu);
	}

	if ($Fila[3] == 3) {
			$SQLBloqueo = "UPDATE Informacion SET Bloqueo = '$Bloquear' WHERE IdInformacion = '$Usuario'";
			EjecutaConsulta($Con,$SQLBloqueo);
		}

		header("Location:HInicioColaborador.php");
}
?>