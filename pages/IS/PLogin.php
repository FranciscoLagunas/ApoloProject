<?php
session_start();
$Username = $_REQUEST['Username'];
$Password = $_REQUEST['Password'];
		
include("Conexion.php");	
$Con = Conectar();
$SQL = "SELECT * FROM usuarios where correoelectronico = '$Username';";		
$query = EjecutaConsulta($Con,$SQL);
$Fila = mysqli_fetch_row($query);
$n = mysqli_num_rows($query);

if($n==0)
{
	print("El usuario no existe <br>");
}
else
{
	//Validar la contraseña
	if($Password == $Fila[3])
	{
		//print("Acceso correcto <br>");		
		$_SESSION['correoelectronico']= $Username;
		$_SESSION['username'] = $Fila[1];
		$_SESSION['Tipo'] = $Fila[4];
		if ($_SESSION['Tipo'] = $Fila[4] == "Colaborador") {
			header("Location:HInicioColaborador.php");
		}
		elseif ($_SESSION['Tipo'] = $Fila[4] == "Creador") {
			header("Location:HInicioCreador.php");
		}
    	$_SESSION['validacion']=True;
	}						
	else
	{
		print("Datos incorrectos");
	}		
}

Cerrar($Con);

?>