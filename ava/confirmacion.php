<?php 
$pago=$_GET["pago"];
$idproducto=$_GET["producto"];

if ($pago!=""){
	echo "se realizo con exito";
}else{
	echo "No se pudo realizar el pago";
}
 ?>
