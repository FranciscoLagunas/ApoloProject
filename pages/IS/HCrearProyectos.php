<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Proyecto</title>
	<link rel="stylesheet" href="style/HcrearProyecto.css">
	<link rel="icon" type="image/jpeg" sizes="32x32"  href="imagenes/favicon.jpeg">
</head>
<body>
	 <div class="container-all">
			<div class="ctn-form">
			<a href="index.php"><img src="imagenes/a.jpg" alt="" class="logo"></a>
                <h1 class="title">Crear Proyecto</h1>
	<form name="form1" method="POST" action="PCrearProyectos.php">
		<label>Llene los campos necesarios para compartir sus ideas</label>

        <label>Nombre de Proyecto</label>
        <input type="text" name="Nombre" size="40" maxlength="40" required/>


	    	
	    	<label>Describa el enfoque del proyecto</label>
	    	<input type="text" name="DescripcionBreve" maxlength="150">


	    	
	    	<label>Añada todas las especificaciones de su proyecto</label>
	    	<input type="text" name="Descripcion" maxlength="1000">

	    	
	    	<label>Añada la fecha en la que el proyecto dará inicio</label>
	    	<input type="date" name="FechaInicio" required>
			</div>
	<!-- ---------------------------------------------------------------------------------    	 -->
	    	<div class="ctn-form">
	    	<label>Cuanto durara el proyecto  (semanas,meses,dias)</label>
	    	<input type="text" name="Duracion" maxlength="10" required>
	
		  	<label>Seleccione el area en la que se enfoca el proyecto</label><br>
			  	<?php
			  	include("Conexion.php");	
				$Con = Conectar();
				$SQL1 = "SELECT * FROM categorias";		
				$query2 = EjecutaConsulta($Con,$SQL1);
				$Fila = mysqli_fetch_row($query2);	
				print("<div class=\"demo\">");
				print("<p>");
				print("<input type='radio' name='Area' value='$Fila[0]'>$Fila[1]<br>");
				print("</p>");
				for ($F = 0;$F<(mysqli_num_rows($query2)-1);$F++)
				{		   
					$Filas1 = mysqli_fetch_row($query2);
					print("<p>");
					print("<input type='radio' name='Area' value='$Filas1[0]'>$Filas1[1]<br>");
					print("</p>");
					print("</div>");
				}	
				
				?>

		  	<label>Seleccione las areas que requiere para el desarrollo del proyecto</label><br>
			  	<?php
				$SQL1 = "SELECT * FROM categorias";		
				$query2 = EjecutaConsulta($Con,$SQL1);
				$Fila = mysqli_fetch_row($query2);	
				print("<p>");
				print("<input type='checkbox' name='AreasSolicitadas[]' value='$Fila[0]'>$Fila[1]<br>");
				print("</p>");
				for ($F = 0;$F<(mysqli_num_rows($query2)-1);$F++)
				{		   
					$Filas1 = mysqli_fetch_row($query2);
					print("<p>");
					print("<input type='checkbox' name='AreasSolicitadas[]' value='$Filas1[0]'>$Filas1[1]<br>");
					print("</p>");
				}	
				
				?>

	        <input type="submit" value="Crear" />

	</form>
	</div>
</div>
</body>
</html>