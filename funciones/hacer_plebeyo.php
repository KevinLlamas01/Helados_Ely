<?php 
include("../clases/Usuario.php");
$usuario=new usuario();

$idusuario=$_GET["idusuario"];

$resultado=$usuario->cambiar_plebeyo($idusuario);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=lista_usuario.php'><script>alert('Felicidades ahora es usuario') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=lista_usuario.php'><script>alert('Aun tienes el poder') </script>";
}

 ?>