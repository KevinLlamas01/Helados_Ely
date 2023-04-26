../<?php 
include("../clases/domicilio.php");
$domicilio=new domicilio();


$iddomicilio=$_POST['iddomicilio'];
$calle=$_POST['calle_numero'];
$cod_p=$_POST['cod_p'];
$colonia=$_POST['colonia'];

$respuesta=$domicilio->actualizar($iddomicilio,$calle,$cod_p,$colonia);

if ($respuesta==true) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_dom.php'> <script> alert('Domicilio modificado correctamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_dom.php'> <script> alert('No se pudo modificar el domicilio') </script>";
}
 ?>