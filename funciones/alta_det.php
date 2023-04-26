<?php 
include("../clases/detalle_venta.php");
$pedido=new pedido();

$idpedido=$_GET["idpedido"];

$resultado=$pedido->alta($idpedido);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_pedido.php'><script>alert('El pedido se dio de alta exitosamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_pedido.php'><script>alert('Intentelo de nuevo') </script>";
}

 ?>