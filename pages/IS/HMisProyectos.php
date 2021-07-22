<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mis Proyectos</title>
	<link rel="stylesheet" href="style/MisProyectos.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpeg" sizes="32x32"  href="imagenes/favicon.jpeg">
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

    <div class="container-all">
    <div class="ctn-form">
        <a href="#"><img src="imagenes/a.jpg" alt="" class="logo"></a>
                <h1 class="title">Estos son los proyectos que creaste</h1>
            <form name="form1" method="POST" action="HInicioColaborador.php">
            <label>Selecciona uno para ver mas detalles</label><br>

        </form>
    </div>
</div>

</body>
</html>

<?php 
$Usuario = $_SESSION['username'];
include("Conexion.php");	
$Con = Conectar();

$SQL = "SELECT * FROM proyectos where creador = '$Usuario';";
$query = EjecutaConsulta($Con,$SQL);
$n = mysqli_num_rows($query);

$tamanio = $n-1;


if ($n >= 1) {
	for ($c=0; $c <= $tamanio; $c++) { 
		$Filas = mysqli_fetch_row($query);
        print("<div class=\"container\">");
        print("<div class=\"card\">");
        print("<div class=\"content\">");
		print("<form name='form1' method='POST' action='HVerMiProyecto.php'>");
		print("<h1>$Filas[3]</h1>");
		print("<p>$Filas[5]<p>");
		print("<input type='text' name='ProyectoI' value='$Filas[0]' hidden/> ");
		print("<input type='submit' value='Detalles'>");
		print("</form>");
        print("</div>");
            print("</div>");
            print("</div>");
	}
}
else
{   print("<div clas=\"container-all\">");
    print("<div clas=\"ctn-form\">");
	print("<h2 clas=\"title\">Aun no tienes proyectos creados</h2>");
	print("<h3 clas=\"title\">Te invitamos a impulsar tus ideas, creando proyectos</h3>");
	print("Da clic en el siguiente link, y comienza a desarrollar tus ideas");
	print("<form method='POST' action='HCrearProyectos.php'>
    <input type='submit' value='Crear'/>
	</form>");
    print("</div>");
    print("</div>");
}

?>