<?php
session_start();
include("../clases/Usuario.php");

$usuario=new Usuario();

$e_mail=$_POST['e_mail'];
$contraseña=$_POST['contraseña'];


$resultado=$usuario->buscar($e_mail, $contraseña);
$resultado2=mysqli_num_rows($resultado);
$datos=mysqli_fetch_assoc($resultado);

if ($resultado2==0) {
	echo "<meta http-equiv='REFRESH' content='0; url=../inicio_sesion.php'> <script> alert('Usuario o contraseña incorrectos') </script>";
	echo "<meta http-equiv='REFRESH' content='0; url=../inicio_sesion.php'> <script> alert('Introdusca sus datos de nuevo') </script>";
}else{
	$_SESSION['idusuario']=$datos['idusuario'];
    $_SESSION['nombre']=$datos['nombre'];
	$_SESSION['e_mail']=$e_mail;
	$_SESSION['tipo']=$datos['tipo'];

	
	echo "<meta http-equiv='REFRESH' content='0; url=../index.php'> <script> alert('Bienvenido(a)') </script>";
}

?>