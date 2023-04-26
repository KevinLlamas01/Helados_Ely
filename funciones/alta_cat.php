<?php 
include("../clases/categoria_producto.php");
$producto=new categoria();

$idcategoria_producto=$_GET["idcategoria_producto"];

$resultado=$producto->alta($idcategoria_producto);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_registro_cat.php'><script>alert('La categoria se dio de alta exitosamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_registro_cat.php'><script>alert('Intentelo de nuevo') </script>";
}

 ?>