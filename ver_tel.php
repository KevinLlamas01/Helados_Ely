<?php
require_once("clases/telefono.php");
include("header_ad.php");
$mostrar=new telefono();
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
	 	  	 <th>Numero</th>
			 <th>Estatus</th>
             <th>Usuario</th>
			 <th>Opciones</th>
			 <?php
			 while ($fila=mysqli_fetch_array($ver)){
			 ?>
			<tr>
				<td> <?=$fila["numero"]?> </td>
				<td> <?=$fila["Estatus"]?> </td>
                <td> <?=$fila["nombre"]?> </td>
				<td>
				<a href="mod_num.php?idtelefono=<?=$fila["idtelefono"]?>"><button style="background-color:white;">Modificar</a></button><br>
				<a href="funciones/baja_tel.php?idtelefono=<?=$fila["idtelefono"]?>"><button style="background-color:white;">Dar de baja</a></button><br>
				<a href="funciones/alta_tel.php?idtelefono=<?=$fila["idtelefono"]?>"> <button style="background-color:white;">Dar de alta</a></button>
				</td>
			</tr>
			<?php
			 }
			 ?>
		 </table>
		</div>
 </body>
 </html>