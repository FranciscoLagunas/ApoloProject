<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/HvistaProyecto.css">
	 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Document</title>
	<link rel="icon" type="image/jpeg" sizes="32x32"  href="imagenes/favicon.jpeg">
</head>
<body>
	<ul>
        <li>
            <a href="HInicioColaborador.php" name="sesionDestroy">
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

$SQL = "SELECT * FROM proyectos where IdProyecto = '$Proyecto';";
$query = EjecutaConsulta($Con,$SQL);
$Fila = mysqli_fetch_row($query);

$SQLR = "SELECT * FROM cantidad where IdProyecto = '$Proyecto';";
$queryR = EjecutaConsulta($Con,$SQLR);
$FilaR = mysqli_fetch_row($queryR);
$n = mysqli_num_rows($query);
$tamanio = $n-1;

$SQLUsu = "SELECT Bloqueo FROM informacion where IdInformacion = '$Usuario';";
$queryUsu = EjecutaConsulta($Con,$SQLUsu);
$FilaUsu = mysqli_fetch_row($queryUsu);

print("<div class=\"container-all\">");
print("<div class=\"ctn-form\">");

print("<form>");
print("<h1 class=\"title\"><strong>Nombre del proyecto:</strong> $Fila[3]</h1>");
print("<h3 class=\"title\">Estado: $Fila[9]</h3>");
print("<h3 class=\"title\">Fecha de publicación: $Fila[6]</h3>");
print("<h3 class=\"title\">Fecha de Inicio: $Fila[7]</h3>");
print("<h2 class=\"title\">Descripción: $Fila[5]</h2>");



if ($FilaUsu[0] == 0) {
	print("<h1 class=\"title\">El personal solicitado es:</h1>");

	print("<div class=\"container\">");	
	
	print("<table>");
	print("<tr>");
	print("<th>Area Solicitada</th>");
	print("<th>Solicitados</th>");
	print("<th>Restantes</th>");
	print("<th>Postularse</th>");
	print("</tr>");



	$SQLNuevo = "SELECT * FROM cantidad where IdProyecto = '$Proyecto';";
	$queryNuevo = EjecutaConsulta($Con,$SQLNuevo);
	$Dato = mysqli_num_rows($queryNuevo);
	
	for ($c=0; $c <= ($Dato-1); $c++) { 
		$Filas = mysqli_fetch_row($queryNuevo);
		$SQLNom =  "SELECT * FROM categorias where IdCategoria = '$Filas[2]'";
		$queryNom = EjecutaConsulta($Con,$SQLNom);
		$FilaNom = mysqli_fetch_row($queryNom);

		print("<tr>");
		print("<td>$FilaNom[1]</td>");
		print("<td>$Filas[3]</td>");
		print("<td>$Filas[4]</td>");
		print("<td><form method='POST' action='PPostular.php'>
    	<input type='submit' name='PostularseBoton' value='$Filas[0]'/>
		</form></td>");
		print("</tr>");
		print("</div>");
	print("</div>");


		
	}
	print("<table>");

}
else {
	print("<h1>No puedes enviar mas solicitudes para colaborar en proyectos</h1>");
}
?>
	 