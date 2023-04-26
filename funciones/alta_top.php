<?php 
include("../clases/toppings.php");
$producto=new toppings();

$idtopping=$_GET["idtopping"];

$resultado=$producto->alta($idtopping);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_reg_toppings.php'><script>alert('El topping se dio de alta exitosamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_reg_toppings.php'><script>alert('Intentelo de nuevo') </script>";
}

 ?>