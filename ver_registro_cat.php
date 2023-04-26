<?php
require_once("clases/categoria_producto.php");
include("header_ad.php");
$mostrar=new categoria();
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
			 <th>Foto</th>
			 <th>Descripcion</th>
			 <th>Estatus</th>
			 <th>Opciones</th>
			 <?php
			 while ($fila=mysqli_fetch_array($ver)){
			 ?>
			<tr>
				<td> <?=$fila["nombre_cat"]?> </td>
				<td> <img class="ft" src="img/<?=$fila["foto"]?>" alt=""> </td>
				<td> <?=$fila["descripcion"]?> </td>
				<td> <?=$fila["estatus"]?> </td>
				<td>
					<br><br>
				<a href="mod_cat.php?idcategoria_producto=<?=$fila["idcategoria_producto"]?>"><button style="background-color:white;">Modificar</a></button><br><br>
				<a href="funciones/baja_cat.php?idcategoria_producto=<?=$fila["idcategoria_producto"]?>"><button style="background-color:white;">Dar de baja</a></button><br><br>
				<a href="funciones/alta_cat.php?idcategoria_producto=<?=$fila["idcategoria_producto"]?>"><button style="background-color:white;">Dar de alta</a></button>
				</td>
			</tr>
			<?php
			 }
			 ?>
		 </table>
		</div>
 </body>
 </html>