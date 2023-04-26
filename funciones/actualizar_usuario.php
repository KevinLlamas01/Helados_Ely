<?php
include("../clases/usuario.php");
$usuario=new usuario();

$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$e_mail=$_POST['e_mail'];
$contraseña=$_POST['contraseña'];



if ($nombre!="") {
$respuesta=$usuario->actualizar($nombre,$apellidos,$e_mail,$contraseña,$tipo);
}else{
$respuesta=$usuario->insertar($nombre,$apellidos,$e_mail,$contraseña,$tipo);
}

if ($respuesta==0) {
	echo "<meta http-equiv='REFRESH' content='0; url=../editar_usuario.php'> <script> alert('Usuaio no actualizado') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../inicio_secion.php'> <script> alert('Usuaio actualizado') </script>";
}

?>