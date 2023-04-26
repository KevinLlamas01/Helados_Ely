<?php 
include("../clases/domicilio.php");
$domicilio=new domicilio();

$iddomicilio=$_GET["iddomicilio"];

$resultado=$domicilio->baja($iddomicilio);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_dom.php'><script>alert('El domicilio se dio de baja exitosamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_dom.php'><script>alert('Intentelo de nuevo') </script>";
}

 ?>