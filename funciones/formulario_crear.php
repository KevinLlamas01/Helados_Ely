<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>REGISTRO</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css?a=2">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css?a=2">
  <nav class="navbar" style="background-color: #F7DC6F ;">
  <div class="container-fluid">


<a href="index.php"><img class="logo" src="img/heladeri.png"></a>
<center>
<div class="col-md-1">
<a class="navbar-brand"> 𝓗𝓮𝓵𝓪𝓭𝓸𝓼  𝓔𝓵𝓲</a>
</div>
</center>
<a class="navbar-brand" href="sobre_nos.html">𝓢𝓸𝓫𝓻𝓮 𝓷𝓸𝓼𝓸𝓽𝓻𝓸𝓼</a>

</nav>
</div>
</head>

<center>
<div class="col-md-4">
<body style="background-color: #A3E4D7;">
  <form method="post">
<h1>Registrate</h1> <br>

<label>Nombre:</label>
<input class="form-control" type="text" name="Username" placeholder="Nombre de usuario">

<label>Apellidos:</label>
<input class="form-control" type="text" name="Apellidos" placeholder="Apellidos"><br>

<label>Email:</label>
<input class="form-control" type="email" name="Email"><br>

<label>Contraseña:</label>
<input class="form-control" type="password" name="Contraseña" placeholder="Ingrese su contraseña"><br>
<button class="btn btn-info" value="Iniciar sesion" type="submit" style="background-color: #F3FC64 ;">Registrarse</button>
</form>
<?php 
include("registrar.php");
?>
</div>
</center>

</body>