<?php 
include("../clases/Usuario.php");
$usuario=new usuario();

$idusuario=$_GET["idusuario"];

$resultado=$usuario->baja($idusuario);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=lista_usuario.php'><script>alert('Se borro el usuario') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=lista_usuario.php'><script>alert('no se fue') </script>";
}

 ?>