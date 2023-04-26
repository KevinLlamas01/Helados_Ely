../<?php 
include("../clases/pedido.php");
$pedido=new pedido();


$idpedido=$_POST['idpedido'];
$codigo_pedido=$_POST['codigo_pedido'];
$fecha_entrega=$_POST['fecha_entrega'];


$respuesta=$pedido->actualizar($idpedido,$codigo_pedido,$fecha_entrega);

if ($respuesta==true) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_pedido.php'> <script> alert('pedido modificado correctamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_pedido.php'> <script> alert('No se pudo modificar el pedido') </script>";
}
 ?>