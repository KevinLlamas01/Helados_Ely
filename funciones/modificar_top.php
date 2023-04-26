../<?php 
include("../clases/toppings.php");
$categoria=new toppings();


$idtopping=$_POST['idtopping'];
$nombre=$_POST['nom'];
$precio=$_POST['precio'];

$archi_foto=$_FILES["foto"]["tmp_name"];
    $foto=$_FILES["foto"]["name"];

move_uploaded_file($archi_foto, "../img/".$foto);

$respuesta=$categoria->actualizar($idtopping,$nombre,$precio,$foto);

if ($respuesta==true) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_reg_toppings.php'> <script> alert('Topping modificado correctamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_reg_toppings.php'> <script> alert('No se pudo modificar el topping') </script>";
}
 ?>