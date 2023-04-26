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
<a class="navbar-brand" href="../sobre_nos.php">𝓢𝓸𝓫𝓻𝓮 𝓷𝓸𝓼𝓸𝓽𝓻𝓸𝓼</a>
<a class="navbar-brand" href="../registro.php">𝓡𝓮𝓰𝓲𝓼𝓽𝓻𝓸</a>



  <?php 
  if (isset($_SESSION['idusuario'])){
    if  ($_SESSION['tipo']==2){ 
      echo '<a class="navbar-brand" href="funciones/lista_usuario.php"> Admin </a> ';
    }
  }else {
    echo '<a class="navbar-brand" href="../inicio_sesion.php"> Inicio de sesion </a>';
  }
   ?>


<a   href="funciones/cerrar_sesion.php"><?php  if (isset($_SESSION['idusuario'])){   echo $_SESSION['nombre'];}  ?></a>

</nav>

</head>

<body style="background-color:#A3E4D7;">
<?php 
// if (!isset($_SESSION["idusuario"])) {
// 	header("location: ../index.php");
// }
//if ($_SESSION["tipo"]==2){
//	header("location: ../lista_usuario.php");

include("../clases/Usuario.php");
$usuario=new usuario();

$arregloDatos=$usuario->mostrar();

?>


		
<br><br>
<style type="text/css">
	.bi{
		font-size: 22px;
		color: blue;
	}
</style>
<div class="container">
	<h2 style="color: black;">Lista de usuarios registrados</h2><br>
	<table class="table table-striped" style="background-color:#f8bbd0;">
		<tr>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th style="color: #76ff03;">Poner power</th>
			<th style="color:red;">Quitar power</th>
			<th style="color:red;">Eliminar usuario</th>
		</tr>

		<?php
		while ($fila=mysqli_fetch_array($arregloDatos)) {
		?>
		<tr>
			<td style="color:blue;"><?=$fila["nombre"]?></td>
			<td style="color:blue;"><?=$fila["apellidos"]?></td>
			<td><?=$fila["e_mail"]?></td>
			<td>


				<a href="hacer_admin.php?idusuario=<?=$fila['idusuario']?>">
					<i title="Ser Administrador" class="bi bi-chevron-double-up"></i>
				</a>
			</td>
			<td>
				<a href="hacer_plebeyo.php?idusuario=<?=$fila['idusuario']?>">
					<i title="ser usuario normal" class="bi bi-chevron-down"></i>
				</a>
			</td>
			<td>
				<a href="baja_usuario.php?idusuario=<?=$fila['idusuario']?>">
					<i title="Eliminar" class="bi bi-eye-slash-fill"></i>
				</a>

			</td>
		</tr>
		<?php

			} 

		?>
		
 
</div>

	</table>
   <br>
			<a href="lista_usuario_baja.php"><button type="value"style="background-color: pink;">Usuarios de baja</button></a>

		</body>	




 