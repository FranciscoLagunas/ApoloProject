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
    <link rel="stylesheet" href="style/Modificarinformacion.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <ul>
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
        <h1 class="title">Modifica la información deseada</h1>

         <form name="form1" method="POST" action="PModificarInformacion.php">
        	<select name="Modificaciones" class="select-css">
            <option value="Nombre">Nombre</option>
            <option value="Apellidos">Apellidos</option> <!-- Opción por defecto -->
            <option value="FechaNacimiento">Fecha de Nacimiento</option>
            <option value="Telefono">Telefono</option>
            <option value="Carrera">Carrera</option>
            <option value="Sexo">Sexo</option>
            <option value="contrasena">Contraseña</option>
            <input type="submit"/>
            </select>
        </form>
    </div>
</div>
    </body>
</html>



<?php	
include("Conexion.php");
$Con = Conectar();
$Usuario = $_SESSION['username'];


$SQL = "SELECT * FROM usuarios where IdInformacion = '$Usuario';";
$query = EjecutaConsulta($Con,$SQL);
$Fila = mysqli_fetch_row($query);


$SQL2 = "SELECT * FROM informacion where IdInformacion = '$Usuario';";
$query2 = EjecutaConsulta($Con,$SQL2);
$Fila2 = mysqli_fetch_row($query2);

if (isset($_POST['Modificaciones'])) 
{
	$Dato = $_POST['Modificaciones'];
    if ($Dato == "FechaNacimiento") 
    {
        print("<div class=\"container-all\">");
        print("<div class=\"ctn-form\">");
        print("<form name='form1' method='POST' action='PModificacionHecha.php'>");
        print("<label>La fecha de nacimiento anterior es: $Fila2[4]</label>");
        print("<label>Ingresa la nueva fecha de nacimiento</label>");
        print("<input type='date' name='ModiFN' required>");
        print("<input type='submit'/>");
        print("</form>");
        print("</div>");
        print("</div>");
    }elseif ($Dato == "contrasena") {
        print("<div class=\"container-all\">");
        print("<div class=\"ctn-form\">");
        print("<form name='form1' method='POST' action='PModificacionHecha.php'>");
        print("<label>La contraseña anterior es: $Fila[3]</label>");
        print("<label>Ingresa la nueva contraseña</label>");
        print("<input type='password' name='ModiCT' maxlength='10' required /> ");
        print("<input type='submit'/>");
        print("</form>");
         print("</div>");
        print("</div>");
    }else
    {
        print("<div class=\"container-all\">");
        print("<div class=\"ctn-form\">");
        print("<form name='form1' method='POST' action='PModificacionHecha.php'>");
        print("<label>Ingresa la actualizacion para $Dato</label>");
        print("<input type='text' name='Modi' size='30' maxlength='30' required/> ");
        print("<input type='text' name='cambiar' value='$Dato' hidden/> ");
        print("<input type='submit'/>");
        print("</form>");
        print("</div>");
        print("</div>");
    }
}

?>
<?php	
