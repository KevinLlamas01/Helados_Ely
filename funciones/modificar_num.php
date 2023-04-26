<?php 
include("../clases/telefono.php");
$telefono=new telefono();


$idtelefono=$_POST['idtelefono'];
$numero=$_POST['numero'];

$respuesta=$telefono->actualizar($idtelefono,$numero);

if ($respuesta==true) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_tel.php'> <script> alert('Categoria modificada correctamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_tel.php'> <script> alert('No se pudo modificar la categoria') </script>";
}
 ?>