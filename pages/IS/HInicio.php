<?php
session_start();
$_SESSION['validacion']=True;
if($_SESSION['validacion']){}
else{header("Location:Login.html");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Apolo</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/jpeg" sizes="32x32"  href="imagenes/favicon.jpeg">
</head>
<body>
	<div class="banner">

	</div>
</body>
</html>