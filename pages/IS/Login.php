<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Apolo</title>
        <link rel="icon" type="image/jpeg" sizes="32x32"  href="imagenes/favicon.jpeg">
        <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="style/login.css">
    </head>
    <body>
        <div class="container-all">
            <div class="ctn-form">
                <a href="../../index.html"><img src="imagenes/a.jpg" alt="" class="logo"></a>            
                <h1 class="title">Iniciar Sesion</h1>

                <form name="form1" method="POST" action="PLogin.php">

                    <label>Correo</label>
                    <input name="Username" type="text" id="Username" maxlength="50">

                    <label>Contraseña</label>
                    <input name="Password" type="password" id="Password" maxlength="10">

                    <input name="Entrar" type="submit" id="Entrar" value="Entrar">

                </form>
                <span class="text-footer">¿Aún no tienes cuenta?<a href="HRegistro.php">
                        Registrate</a>
                </span>

            </div>

            <div class="ctn-text">
                <div class="capa"></div>

                <h1 class="title-description">Bienvenido a Apolo</h1>
                <p class="text-description">Dsifruta de la experiencia
                </p>
            </div>

        </div>

        <!-- PONER FECHA ACTUAL -->
        <!-- <input type="date" name="cumpleanios" step="1" min="2013-01-01"
        max="2013-12-31" value="<?php echo date("Y-m-d");?>"> -->

    </body>
</html>