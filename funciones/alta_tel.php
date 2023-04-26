../<?php 
include("../clases/telefono.php");
$telefono=new telefono();

$idtelefono=$_GET["idtelefono"];

$resultado=$telefono->alta($idtelefono);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_tel.php'><script>alert('El telefono se dio de alta exitosamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_tel.php'><script>alert('Intentelo de nuevo') </script>";
}

 ?>