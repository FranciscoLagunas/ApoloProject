<?php
session_start();
if($_SESSION['validacion'])
{}else{header("Location:Login.html");}

$Usuario = $_SESSION['username'];


$Cantidad = $_REQUEST['Cantidad'];
$ProyectoId = $_REQUEST['ProyectoId'];
$AreasSolicitadas = $_REQUEST['AreasSolicitadas'];

print_r($Cantidad);
print_r($ProyectoId);
print_r($AreasSolicitadas);

$tamanio = (sizeof($AreasSolicitadas)-1);

include("Conexion.php");	
$Con = Conectar();

for ($b=0; $b <= $tamanio ; $b++) { 
	//INSERTAMOS LA CANTIDAD DE PERSONAS EN LAS AREAS SOLICITADAS
	$SQL = "INSERT INTO cantidad(IdProyecto,AreaSolicitada,CantidadIntegrantes, Restantes) VALUES('$ProyectoId','$AreasSolicitadas[$b]','$Cantidad[$b]','$Cantidad[$b]');";
	EjecutaConsulta($Con,$SQL);
}

header("Location:HInicioCreador.php");
?>