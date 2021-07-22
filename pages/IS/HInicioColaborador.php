<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Apolo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style/HInicioColaborador.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" type="image/jpeg" sizes="32x32"  href="imagenes/favicon.jpeg">
</head>
<body>
	<ul>
		<li>
			<a href="PModificarInformacion.php" name="ModificarInformacion">
				<div class="icon">
					 <i class="fa fa-id-card-o" aria-hidden="true"></i>
                   <i class="fa fa-id-card-o" aria-hidden="true"></i>
				</div>
				<div class="name"><span data-text="Modificar Perfil">Modificar Perfil</span></div>
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
   
 <div class="container-all">
	<div class="ctn-form">
		<a href="#"><img src="imagenes/a.jpg" alt="" class="logo"></a>
                <h1 class="title">Bienvenido a <b>Apolo</b> ya eres un colaborador</h1>
			<form name="form1" method="POST" action="HInicioColaborador.php">
 			<label>Seleccione areas de interes que desea buscar</label><br>
  			<?php
			include("Conexion.php");	
			$Con = Conectar();
			$SQL = "SELECT * FROM categorias";		
			$query = EjecutaConsulta($Con,$SQL);
			$Fila = mysqli_fetch_row($query);	
			print("<input type='checkbox' class=\"checkbox\"name='Busqueda[]' value='$Fila[0]'>$Fila[1]<br>");
			for ($F = 0;$F<(mysqli_num_rows($query)-1);$F++)
			{		   
				$Filas = mysqli_fetch_row($query);
			print("<input type='checkbox' class=\"checkbox\" name='Busqueda[]' value='$Filas[0]'>$Filas[1]<br>");

			}	
			?>
			<input type="submit" value="Buscar">
			</form>
	</div>	
	</div>
</body>
</html>

<?php	
$Con = Conectar();
if (isset($_POST['Busqueda'])) 
{
	$BusquedaEspecifica = $_POST['Busqueda'];
	$TamanioBusqueda = (sizeof($BusquedaEspecifica)-1);	

	$Usuario = $_SESSION['username'];

	for ($a=0; $a <= $TamanioBusqueda ; $a++) { 
		$SQL4 =  "SELECT * FROM Proyectos where Areaprincipal = '$BusquedaEspecifica[$a]'";
		$query4 = EjecutaConsulta($Con,$SQL4);
		$Fila4 = mysqli_fetch_row($query4);
		$resultda = mysqli_num_rows($query4);

		if ($resultda == 0) {			
		}
		else
		{
			print("<div class=\"container\">");
			print("<div class=\"card\">");
			print("<div class=\"content\">");
			print("<form name='form1' method='POST' action='HVistaProyecto.php'>");		
			print("<h1>$Fila4[3]</h1>");
			print("<p>$Fila4[5]<p>");
			print("<input type='text' name='ProyectoI' value='$Fila4[0]' hidden/> ");
			print("<input type='submit' value='Mas Información'>");
			print("</form>");
			/*quitar los div de mas y se aregla la pagina*/


			for ($i=0; $i < (mysqli_num_rows($query4)-1) ; $i++) { 
			$Filas4 = mysqli_fetch_row($query4);
			print("<div class=\"container\">");
			print("<div class=\"card\">");
			print("<div class=\"content\">");
			print("<form name='form1' method='POST' action='HVistaProyecto.php'>");
			print("<h1>$Filas4[3]</h1>");
			print("<p>$Filas4[5]<p>");
			print("<input type='text' name='ProyectoI' value='$Filas4[0]' hidden/> ");
			print("<input type='submit' value='Mas Información'>");
			print("</form>");
			print("</div>");
			print("</div>");
			print("</div>");
			}
		}
	}
}
else
{
	$Usuario = $_SESSION['username'];
	$SQL1 = "SELECT IdCategoria FROM gustocategoria where idInformacion = '$Usuario'";
	$query1 = EjecutaConsulta($Con,$SQL1);
	$Fila = mysqli_fetch_row($query1);


	$SQL2 =  "SELECT * FROM Proyectos where Areaprincipal = '$Fila[0]'";
	$query2 = EjecutaConsulta($Con,$SQL2);
	$Fila2 = mysqli_fetch_row($query2);
	print("<div class=\"container\">");
	print("<div class=\"card\">");
	print("<div class=\"content\">");
	print("<form name='form1' method='POST' action='HVistaProyecto.php'>");
	print("<h1>$Fila2[3]</h1>");
	print("<p>$Fila2[5]</p>");
	print("<input type='text' name='ProyectoI' value='$Fila2[0]' hidden/> ");
	print("<input type='submit' value='Mas Información'>");
	print("</form>");
	print("</div>");
	print("</div>");
	print("</div>");

	for ($i=0; $i < (mysqli_num_rows($query2)-1) ; $i++) { 
		$Filas2 = mysqli_fetch_row($query2);
		print("<div class=\"container\">");
		print("<div class=\"card\">");
		print("<div class=\"content\">");
		print("<form name='form1' method='POST' action='HVistaProyecto.php'>");
		print("<h1>$Filas2[3]</h1>");
		print("<p>$Filas2[5]<p>");
		print("<input type='text' name='ProyectoI' value='$Filas2[0]' hidden/> ");
		print("<input type='submit' value='Mas Información'>");
		print("</form>");
		print("</div>");
		print("</div>");
		print("</div>");
	}

	for ($F = 0;$F<(mysqli_num_rows($query1)-1);$F++)
		{		   		
			$Filas = mysqli_fetch_row($query1);

			$SQL3 =  "SELECT * FROM Proyectos where Areaprincipal = '$Filas[0]'";
			$query3 = EjecutaConsulta($Con,$SQL3);
			$Fila3 = mysqli_fetch_row($query3);

			if (mysqli_num_rows($query3) == 0) {
				//No hay
			}
			else{
				print("<div class=\"container\">");
				print("<div class=\"card\">");
				print("<div class=\"content\">");
				print("<form name='form1' method='POST' action='HVistaProyecto.php'>");
				print("<h1>$Fila3[3]</h1>");
				print("<p>$Fila3[5]<p>");
				print("<input type='text' name='ProyectoI' value='$Fila3[0]' hidden/> ");
				print("<input type='submit' value='Mas Información'>");
				print("</form>");
				print("</div>");
					print("</div>");
					print("</div>");
				for ($i=0; $i < (mysqli_num_rows($query3)-1) ; $i++) { 
					$Filas3 = mysqli_fetch_row($query3);
					print("<div class=\"container\">");
				print("<div class=\"card\">");
				print("<div class=\"content\">");
					print("<form name='form1' method='POST' action='HVistaProyecto.php'>");
					print("<h1>$Filas3[3]</h1>");
					print("<p>$Filas3[5]<p>");
					print("<input type='text' name='ProyectoI' value='$Filas3[0]' hidden/> ");
					print("<input type='submit' value='Mas Información'>");
					print("</form>");
					print("</div>");
					print("</div>");
					print("</div>");
				}
			}
			
		}
}

?>