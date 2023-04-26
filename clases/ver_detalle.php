<?php 
include("articulo.php");
$articulo=new Articulo();

$id=$_GET['producto'];

$respuesta=$articulo->mostrarPorId($id);
$datos=mysqli_fetch_assoc($respuesta);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	<div>
 		<h1>Detalles del prodcuto</h1>
 		<h2><?=$datos["nombre"]?></h2>
 		<img src="<?=$datos['foto']?>">
 		<h4><?=$datos["descripcion"]?></h4>
 		<h3><?=$datos["precio"]?></h3>
        <?php include("pago.php"); ?>
 	</div>
 
 </body>
 </html>