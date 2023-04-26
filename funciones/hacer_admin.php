<?php 
include("../clases/Usuario.php");
$usuario=new Usuario();

$idusuario=$_GET["idusuario"];

$resultado=$usuario->cambiar_admin($idusuario);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=lista_usuario.php'><script>alert('Ahoras es Administrador') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=lista_usuario.php'><script>alert('Fallo la transformacion') </script>";
}

 ?>