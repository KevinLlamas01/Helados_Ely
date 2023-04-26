<?php 
include("../clases/categoria_producto.php");
$categoria=new categoria();


$idcategoria_producto=$_POST['idcategoria_producto'];
$nombre=$_POST['nom'];
$descripcion = $_POST['descripcion'];
$archi_foto=$_FILES["foto"]["tmp_name"];
    $foto=$_FILES["foto"]["name"];

move_uploaded_file($archi_foto, "../img/".$foto);


$respuesta=$categoria->actualizar($idcategoria_producto,$nombre,$foto,$descripcion);

if ($respuesta==true) {
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_registro_cat.php'> <script> alert('Categoria modificada correctamente') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../ver_registro_cat.php'> <script> alert('No se pudo modificar la categoria') </script>";
}
 ?>
