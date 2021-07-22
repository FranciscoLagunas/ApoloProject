<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}

include("Conexion.php");
$Con = Conectar();
$Usuario = $_SESSION['username'];

if (isset($_POST['ModiFN'])) {
	$Dato = $_POST['ModiFN'];
	$SQLFN = "UPDATE Informacion SET FechaNacimiento = '$Dato' WHERE IdInformacion = '$Usuario';";
	$query = EjecutaConsulta($Con,$SQLFN);
	header("Location:Index.php");
}
elseif (isset($_POST['ModiCT'])) {
	$Dato = $_POST['ModiCT'];

	$SQLCT= "UPDATE Usuarios SET Contrasena = '$Dato' WHERE IdInformacion = '$Usuario';";
	$query = EjecutaConsulta($Con,$SQLCT);
	header("Location:Index.php");
}else {
	$Dato = $_POST['Modi'];
	$columna = $_POST['cambiar'];
	$SQL= "UPDATE Informacion SET $columna = '$Dato' WHERE IdInformacion = '$Usuario';";
	$query = EjecutaConsulta($Con,$SQL);
	header("Location:Index.php");
}

?>