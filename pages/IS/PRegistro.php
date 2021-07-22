<?php
session_start();
$_SESSION['validacion']=True;
if($_SESSION['validacion'])
{}else{header("Location:Login.html");}

$Nombre = $_REQUEST['Nombre'];
$Apellidos = $_REQUEST['Apellidos'];
$Correo = $_REQUEST['Correo'];
$Password = $_REQUEST['Password'];
$Telefono = $_REQUEST['Telefono'];
$Especialidad = $_REQUEST['OpcionEspecialidad'];
$Carrera = $_REQUEST['Carrera'];
$FechaNacimiento = $_REQUEST['FechaNacimiento'];
$Sexo = $_REQUEST['Sexo'];
$TipoUsuario = $_REQUEST['TipoUsuario'];

$Gustos = $_REQUEST['AreasInteres'];
$tamanio = sizeof($Gustos);

include("Conexion.php");	
$Con = Conectar();


$SQL = "SELECT * FROM usuarios where correoelectronico = '$Correo';";		
$query = EjecutaConsulta($Con,$SQL);
$Fila = mysqli_fetch_row($query);
$n = mysqli_num_rows($query);
if ($n==0) 
{
	$_SESSION['Existente'] = False;

	$SQLConsulta = "SELECT * FROM Categorias where nombre = '$Especialidad';";		
	$query = EjecutaConsulta($Con,$SQLConsulta);
	$Filas = mysqli_fetch_row($query); 

	$SQL = "INSERT INTO informacion(areaespecialidad,nombre,apellidos,FechaNacimiento,Telefono,Carrera,Sexo) VALUES('$Filas[0]','$Nombre','$Apellidos','$FechaNacimiento', '$Telefono','$Carrera','$Sexo');";
	EjecutaConsulta($Con,$SQL);


	$SQLConsulta1 = "SELECT * FROM informacion where nombre = '$Nombre' && apellidos = '$Apellidos' && FechaNacimiento = '$FechaNacimiento';";		
	$query = EjecutaConsulta($Con,$SQLConsulta1);
	$Filas1 = mysqli_fetch_row($query); 

	$SQL1 = "INSERT INTO usuarios(IdInformacion,correoelectronico,Contrasena,Tipo) VALUES('$Filas1[0]','$Correo','$Password','$TipoUsuario');";
	EjecutaConsulta($Con,$SQL1);

	for ($i=0; $i < $tamanio; $i++) { 
		$InsertatePorFavor = $Gustos[$i];
	$SQLGustos = "INSERT INTO gustocategoria(IdInformacion,IdCategoria) VALUES('$Filas1[0]','$InsertatePorFavor');";
	EjecutaConsulta($Con,$SQLGustos);
	}

	$_SESSION['username'] = $Filas1[0];
	$_SESSION['Tipo'] = $TipoUsuario;

	if ($_SESSION['Tipo'] == "Colaborador") {
		header("Location:HInicioColaborador.php");
	}
	elseif ($_SESSION['Tipo'] == "Creador") {
		header("Location:HInicioCreador.php");
	}
    $_SESSION['validacion']=True;
}
else
{
	header("Location:HRegistro.php");
	$_SESSION['Existente'] = True;
}
?>