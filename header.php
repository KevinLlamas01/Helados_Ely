<!--Inicio del header-->


<?php 
session_start();
//if (!isset($_SESSION['idusuario'])) {
   //header("location: inicio_sesion.php");
   
  //} 
 ?>
 <body style="background-color: #A3E4D7;">
<!DOCTYPE html> 
<html>
<!--Navegador-->
<head>
  <script type="text/javascript" src="js/bootstrap.js"></script>
	<title>INDEX1</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css?a=9">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css?a=1">
<style> @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap'); </style>

  <nav class="navbar" style="background-color: #F7DC6F ;">
  <div class="container-fluid">

<a class="letra" href="index.php"><img class="logo" src="img/heladeri.png"></a>
<a class="letra" href="index.php">Helados eli</a>
<a class="letra" href="sobre_nos.php">Sobre nosotros</a>
<a class="letra" href="ava/catalogo.php">Catalogo</a>



<a class="letra" href="registro.php"><?php  if (!isset($_SESSION['idusuario'])){  ;}  ?></a>



  <?php 
  if (isset($_SESSION['idusuario'])){
    if  ($_SESSION['tipo']==2){ 
      echo '<a class="navbar-brand" style="color:blueviolet;" href="index_ad.php" > Admin </a> ';
    }
  }else {
    echo '<a class="letra" href="inicio_sesion.php"> Inicio de sesion </a>';
  }
   ?>


<a class="letra"  href="funciones/cerrar_sesion.php"><?php  if (isset($_SESSION['idusuario'])){   echo $_SESSION['nombre'];}  ?></a>

<a href="ava/mostrar_carrito.php" class="btn btn-primary">
                    Carrito<span id="num_cart" class="badge bg-secondary"></span>
                </a>

</nav>

</head>