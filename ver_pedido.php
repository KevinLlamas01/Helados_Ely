<?php
require_once("clases/pedido.php");
include("header_ad.php");
$mostrar=new pedido();
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
			 <th>Codigo de pedido</th>
			 <th>Fecha de entrega</th>
			 <th>Venta</th>
			 <th>Estatus</th>
			 <th>Opciones</th>
			 <?php
			 while ($fila=mysqli_fetch_array($ver)){
			 ?>
			<tr>
				<td> <?=$fila["codigo_pedido"]?> </td>
				<td> <?=$fila["fecha_entrega"]?> </td>
				<td> <?=$fila["fk_venta"]?> </td>
				<td> <?=$fila["Estatus"]?> </td>

				<td>
				<a href="mod_ped.php?idpedido=<?=$fila["idpedido"]?>"><button style="background-color:white;">Modificar</a></button><br>
				<a href="funciones/baja_ped.php?idpedido=<?=$fila["idpedido"]?>"><button style="background-color:white;">Dar de baja</a></button><br>
				<a href="funciones/alta_ped.php?idpedido=<?=$fila["idpedido"]?>"><button style="background-color:white;">Dar de alta</a></button>
				</td>
			</tr>
			<?php
			 }
			 ?>
		 </table>
		</div>
 </body>
 </html>

