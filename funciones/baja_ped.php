<?php 
include("../clases/pedido.php");
$pedido=new pedido();

$idpedido=$_GET["idpedido"];

$resultado=$pedido->baja($idpedido);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_pedido.php'><script>alert('El pedido se dio de baja exitosamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_pedido.php'><script>alert('Intentelo de nuevo') </script>";
}

 ?>