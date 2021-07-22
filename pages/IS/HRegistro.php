<?php
session_start();
if($_SESSION['Existente'])
{
    print("<h1>El correo ingresado ya pertenece a una cuenta registrada</h1>");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Apolo</title>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			<link rel="stylesheet" href="style/HRegistro.css">
        <link
            href="https://fonts.googleapis.com/css?family=Raleway&display=swap"
            rel="stylesheet">

        <script src="../jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="icon" type="image/jpeg" sizes="32x32"  href="imagenes/favicon.jpeg">
    </head>
    <body>

        <div class="container-all">
			<div class="ctn-form">
			<a href="../../index.html"><img src="imagenes/a.jpg" alt="" class="logo"></a>
                <h1 class="title">Registrate</h1>

				<form role="form" name="form1" method="POST" action="PRegistro.php">
				<label for="">Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name="Nombre"
                    id="Nombre"
                    maxlength="50"
					required="required"/>
					
				<label for="">Apellido</label>
                <input
                    type="text"
                    class="form-control"
                    name="Apellidos"
                  
                    maxlength="30"
                    required="required"
                    id="Apellido"/>

                <!-----------------------------Email------------------------------------>
				<label for="">Correo</label>
                <input
                    type="email"
                    class="form-control"
                   
                    name="Correo"
                    id="C1"
                    maxlength="50"
                    required="required"/>
				<label for="">Confirma Correo</label>
                <input
                    type="email"
                    class="form-control"
                   
                    name="Correo1"
                    id="C2"
                    required="required"
                    onkeyup="return checar()"/>

                <!-- SE PUEDE USAR ONKEYPRESS PARA SOLO DETECTAR LOS NUMEROS O LETRAS, PERO
                REALIZA LA ACCIÓN HASTA EL SEGUNDO ERROR -->
                <script language="JavaScript" type="text/JavaScript">
                    function checar() {
                        var C1 = document
                            .getElementById("C1")
                            .value;
                        separados = C1.split('');
                        var C2 = document
                            .getElementById("C2")
                            .value;
                        separados2 = C2.split('');
                        for (i = 0; i <= (separados2.length - 1); i++) {
                            if (separados2[i] === separados[i]) {} else {
                                alert("Los correos no coinciden");
                                i = separados2.length - 1;
                            }
                        }
                    }
                </script>

                <!--------------------------------Contraseña------------------------------>
				<label for="">Contraseña</label>
                <input
                    type="password"
                    id="contrasena"
               
                    class="form-control"
                    name="Password"
                    maxlength="10"
                    onkeyup="return validarPasswd()"
                    required="required"/>

                <script language="javascript" type="text/javascript">
                    function validarPasswd() {
                        var p1 = document
                            .getElementById("contrasena")
                            .value;
                        var noValido = /\s/;

                        if (noValido.test(p1)) { // se chequea el regex de que el string no tenga espacio
                            alert("La contraseña no puede contener espacios en blanco");
                            return false;
                        } else {
                            return false;
                        }
                    }
                </script>
				<span>
				<input type="checkbox" id="mostrar_contrasena">
				Mostrar Contraseña
			</span>
                

                <script>
                    $(document).ready(function () {

                        $('#mostrar_contrasena').click(function () {
                            if ($('#mostrar_contrasena').is(':checked')) {
                                $('#contrasena').attr('type', 'text');
                            } else {
                                $('#contrasena').attr('type', 'password');
                            }
                        });
                    });
                </script>
                <label for="">Telefono</label>
				<input
                    type="text"
                    id="telefono"
                 
                    name="Telefono"
                    class="form-control"
                    maxlength="15"
                    required="required">

                <!-------------------------------------------Fin
                Emqail------------------------------------>

       
			</div>
			<div class="ctn-form">
				
					

                <!-------------------------------------------Opciones------------------------------------>
				<label for="">Seleccione su area de Especialidad</label>
				<?php
                include("Conexion.php");	
                $Con = Conectar();
                $SQL = "SELECT * FROM categorias";		
                $query = EjecutaConsulta($Con,$SQL);
                $Fila = mysqli_fetch_row($query);
                print("<select class=\"select-css\" name='OpcionEspecialidad' id='especialidad' required>");
                print("<option name='$Fila[0]'>".$Fila[1]."</option>");
                for ($F = 0;$F<(mysqli_num_rows($query)-1);$F++)
                {		   
				$Filas = mysqli_fetch_row($query); //devulve una Filas de la tabla de datos de la entidad
				print("<option name='$Filas[0]'>".$Filas[1]."</option>");
			}
				print("</select>");
			?> 
                

               

                <!--------------------------Fin
                Opciones------------------------------------------>
				<label >Carrera</label>
                <input
                    type="text"
                    id="carrera"
                    class="form-control"
                    name="Carrera"
                    maxlength="100"
                    size="50"
                    required="required">
				  <label for="Creador">Fecha de Nacimiento</label>
                <input
                    type="date"
                    class="form-control"
                    id="nacimiento"
                    name="FechaNacimiento"
                    required="required">

                <!-------------------------------------------Genero------------------------------------>

                <label>Genero</label>
                <span>  <input
                    type="radio"
                    class="controls"
                    value="Hombre"
                    name="Sexo"
                    checked="checked"
                    id="hombre"> Hombre<br><br></span> 
               

              <span> <input
                    type="radio"
                    class=""
                    value="Mujer"
                    name="Sexo"
                    checked="checked"
                    id="mujer"> Mujer</span>
 				
                
               

                <!-------------------------------------------Tipo
                Ua------------------------------------>

                <label>Elija el tipo de usuario que desea ser:</label>

                <span> <input
                    type="radio"
                    class="controls"
                    name="TipoUsuario"
                    value="Colaborador"
                    id="Colaborador"
                    checked="checked"> Colaborador<br><br></span>
               
                
				<span><input
                    type="radio"
                    class="controls"
                    name="TipoUsuario"
                    value="Creador"
                    id="Creador"> Creador</span>
                

                <!-----------------------------Area de
                especialidad------------------------------------------------->

            <label>Seleccione las areas en las que le gustaria conocer proyectos</label>
            <span> <?php
			$SQL1 = "SELECT * FROM categorias";		
			$query2 = EjecutaConsulta($Con,$SQL1);
			$Fila = mysqli_fetch_row($query2);	
			print("<div class=\"form-group\">");
			print("<input class=\"checkboz\" type='checkbox'name='AreasInteres[]' value='$Fila[0]'> $Fila[1]<br>");



			for ($F = 0;$F<(mysqli_num_rows($query2)-1);$F++)
			{		   
				$Filas1 = mysqli_fetch_row($query2);

				print("<input id='fil'class=\"checkboz\"type='checkbox' name='AreasInteres[]' value='$Filas1[0]'>   $Filas1[1]<br>");			
			}	
                print("</div");
			?></span>
           

						<input name="Entrar" type="submit" id="Entrar" value="Registrarse">
           		</form>

           		<span class="text-footer">¿Ya tienes cuenta?<a href="login.php">
                        Inicia Sesión</a>
                </span>



			</div>
            
    </div>

</body>
</html>