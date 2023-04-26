<?php 
include("../clases/producto.php");
$producto=new producto();

$idproducto=$_GET["idproducto"];

$resultado=$producto->baja($idproducto);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_registro_prod.php'><script>alert('El producto se dio de baja exitosamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_registro_prod.php'><script>alert('Intentelo de nuevo') </script>";
}

 ?>