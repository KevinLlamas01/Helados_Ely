<?php
require_once("clases/producto.php");
include("header_ad.php");
$mostrar=new producto();
$ver=$mostrar->mostrar();
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
	 <meta charset="UTF-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>Document</title>
 </head>
 <body>
	 	<br><br><br>
 	<div class="container">
	  <table class="table table-striped" style="background-color:#f8bbd0;">
			 <th>Nombre</th>
			 <th>Precio</th>
			 <th>Descripcion</th>
			 <th>Stock</th>
			 <th>Foto</th>
			 <th>Estatus</th>
			 <th>Opciones</th>
			 <?php
			 while ($fila=mysqli_fetch_array($ver)){
			 ?>
			<tr>
				<td> <?=$fila["nombre"]?> </td>
				<td> <?=$fila["precio"]?> </td>
				<td> <?=$fila["descripcion"]?> </td>
				<td> <?=$fila["stock"]?> </td>
				<td> <img class="ft" src="img/<?=$fila["foto"]?>" alt=""></td>
				<td> <?=$fila["estatus"]?> </td>
				<td>
				<a href="mod_prod.php?idproducto=<?=$fila["idproducto"]?>"><button style="background-color:white;">Modificar</a></button><br>
				<a href="funciones/baja_prod.php?idproducto=<?=$fila["idproducto"]?>"><button style="background-color:white;">Dar de baja</a></button><br>
				<a href="funciones/alta_prod.php?idproducto=<?=$fila["idproducto"]?>"><button style="background-color:white;">Dar de alta</a></button>
				</td>
			</tr>
			<?php
			 }
			 ?>
		 </table>
		</div>
 </body>
 </html>

