<?php 
include("../clases/producto.php");
$categoria=new producto();


$idproducto=$_POST['idproducto'];
$nombre=$_POST['nom'];
$precio=$_POST['precio'];
$desc=$_POST['desc'];
$stock=$_POST['stock'];

$archi_foto=$_FILES["foto"]["tmp_name"];
    $foto=$_FILES["foto"]["name"];

move_uploaded_file($archi_foto, "../img/".$foto);

$respuesta=$categoria->actualizar($idproducto,$nombre,$precio,$desc,$stock,$foto);

if ($respuesta==true) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_registro_prod.php'> <script> alert('Categoria modificada correctamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../mod_prod.php'> <script> alert('No se pudo modificar la categoria') </script>";
}
 ?>