<?php
include("../clases/usuario.php");
$usuario=new usuario();

$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$e_mail=$_POST['e_mail'];
$contraseña=$_POST['contraseña'];
$tipo=$_POST['tipo'];


$respuesta=$usuario->insertar($nombre,$apellidos,$e_mail,$contraseña,$tipo);

if ($respuesta==0) {
	echo "<meta http-equiv='REFRESH' content='0; url=../registro.php'> <script> alert('Usuario no registrado') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../inicio_sesion.php'> <script> alert('Usuario registrado') </script>";

	if ($respuesta==true) {
	echo "Guardado";
    }else{
	echo "Error";
}

?>
}

?>