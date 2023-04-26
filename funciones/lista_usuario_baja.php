<!DOCTYPE html>
<html>
<!--Navegador-->
<head>
  <script type="text/javascript" src="js/bootstrap.js"></script>
	<title>INDEX1</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?a=2">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css?a=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <nav class="navbar" style="background-color: #F7DC6F ;">
  <div class="container-fluid">

<a href="../index.php"><img class="logo" src="../img/heladeri.png"></a>
<a class="navbar-brand" href="../index_ad.php">Inicio</a>
<a class="navbar-brand" href="sobre_nos.php">𝓢𝓸𝓫𝓻𝓮 𝓷𝓸𝓼𝓸𝓽𝓻𝓸𝓼</a>
<a class="navbar-brand" href="registro.php">𝓡𝓮𝓰𝓲𝓼𝓽𝓻𝓸</a>



  <?php 
  if (isset($_SESSION['idusuario'])){
    if  ($_SESSION['tipo']==2){ 
      echo '<a class="navbar-brand" href="lista_usuario.php"> Admin </a> ';
    }
  }else {
    echo '<a class="navbar-brand" href="inicio_sesion.php"> Inicio de sesion </a>';
  }
   ?>


<a   href="funciones/cerrar_sesion.php"><?php  if (isset($_SESSION['idusuario'])){   echo $_SESSION['nombre'];}  ?></a>

</nav>

</head>

<body style="background-color: #A3E4D7;">

 <?php 
/*include ("nav.php");
include ("navb.php");
<?php 
/*include ("nav.php");
include ("navb.php");
include ("navbar.php");*/
include("../clases/Usuario.php");
$usuario=new Usuario();

$arregloDatos=$usuario->mostrar_baja();

?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css?a=22">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="css/estilo_flip.css?b=3">
<br><br>
<style type="text/css">
	.bi{
		font-size: 22px;
		color: blue;
	}
<?php 

include ('../header.php');

 ?>
 	
 </style>
<div class="container">
	<h2 style="color: black;">Lista de usuarios dados de baja</h2><br>
	<table class="table table-striped" style="background-color:#f8bbd0;">
		<tr>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th>Opciones</th>
		</tr>
		<?php
		while ($fila=mysqli_fetch_array($arregloDatos)) {
		?>
		<tr>
			<td style="color: darkred;"><?=$fila["nombre"]?></td>
			<td style="color: darkred;"><?=$fila["apellidos"]?></td>
			<td style="color: darkred;"><?=$fila["e_mail"]?></td>
			<td>
				<a href="volver_activo.php?idusuario=<?=$fila['idusuario']?>">
					<i title="Volver a Activar" class="bi bi-eye-fill"></i>
				</a>
			</td>
		</tr>
		<?php

			} 

		?>
	</table>
	<a href="lista_usuario.php"><button type="value" style="background-color:#f8bbd0;">Usuarios</button></a>
</div>
</body>
</html>
