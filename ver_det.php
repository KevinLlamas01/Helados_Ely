<?php
require_once("clases/detalle_venta.php");
include("header_ad.php");
$mostrar=new detalle();
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
			 <th>Venta</th>
			 <th>Productos</th>
			 <th>Cantidad</th>
			 <?php
			 while ($fila=mysqli_fetch_array($ver)){
			 ?>
			<tr>
				<td> <?=$fila["fk_venta"]?> </td>
				<td> <?=$fila["fk_producto"]?> </td>
				<td> <?=$fila["cantidad"]?> </td>
			</tr>
			<?php
			 }
			 ?>
		 </table>
		</div>
 </body>
 </html>

