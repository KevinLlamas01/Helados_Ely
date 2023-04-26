<?php 
include("../clases/detalle_venta.php");
$detalle=new detalle();

$iddetalle_venta=$_GET["iddetalle_venta"];

$resultado=$detalle->baja($iddetalle_venta);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_pedido.php'><script>alert('Se dio de baja exitosamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_pedido.php'><script>alert('Intentelo de nuevo') </script>";
}

 ?>