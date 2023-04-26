<?php
require_once("clases/venta.php");
include("header_ad.php");
$mostrar=new venta();
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
			 <th>Fecha</th>
			 <th>Subtotal</th>
			 <th>Total</th>
             <th>Iva</th>
             <th>Metodo de pago</th>
             <th>Estatus</th>
			 <?php
			 while ($fila=mysqli_fetch_array($ver)){
			 ?>
			<tr>
				<td> <?=$fila["fecha"]?> </td>
				<td> <?=$fila["subtotal"]?> </td>
                <td><?=$fila["total"]?></td>
                <td><?=$fila["iva"]?></td>
                <td><?=$fila["fk_metodo_pago"]?></td>
				<td> <?=$fila["estatus"]?> </td>
			</tr>
			<?php
			 }
			 ?>
		 </table>
		</div>
 </body>
 </html>