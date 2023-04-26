<!DOCTYPE html>
<html>

<?php
include 'funciones/seleccionar_predeterminado.php';
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<style type="text/css">
		#descripcion{
	 		width: 400px;
	 		height: 200px;
	 	}
	 	a{
	 		text-decoration: none;
	 		color: black;
	 	}
	</style>
</head>
<body>
	<style type="text/css">
	.in{
		width: 47%;
	}
</style>
	<br><br>
<center>
	<div class="col-8" style="background-color:pink;">
		<br>
	<form class="in" method="POST" action="funciones/guardar_direcciones.php">

<input class="in" type="text" required name="calle_numero" placeholder="Calle y numero" value="<?php echo $calle_numero;?>" id = "lugar" style="background-color:#fbe9e7;">
<br><br>
<input class="in" type="number" required name="cod_p" placeholder="Codigo postal" value="<?php  echo $cod_p;?>" id="lugar" style="background-color:#fbe9e7;">
<br><br>
<input class="in" type="text" required name="colonia" placeholder="Colonia" value="<?php echo $colonia;?>" id="lugar" style="background-color:#fbe9e7;">
<br><br>
<input class="in" type="text" name="ciudad" value="Escuinapa de Hidalgo" disabled id="ciudad" style="background-color:#fbe9e7;">
<br><br>
<input class="in" type="text" name="descripcion" placeholder="Ingresar numero de casa, señalamientos, etc. (opcional)" width="200px" height="200px" id="descripcion" value="<?php echo $descripcion; ?>" style="background-color:#fbe9e7;">
<br><br>

<!--Botones:-->
<button type="submit" name="submit" value="Enviar datos" style="background-color:#d4e157;">Enviar datos</button>
<button type="submit" name="submit" value="Guardar como direccion predeterminada" formaction="funciones/direccion_predeterminada.php" style="background-color:#d4e157;">Guardar como direccion predeterminada</button>
<button type="submit" value="ver en el mapa" id="busca" formaction="funciones/mapa.php"style="background-color:#d4e157;">Ver en el mapa</button>
<button name="borrar" formaction="direcciones.php" style="background-color:#d4e157;">Borrar informacion</button>
</form>


<form action="direcciones.php">
<button type="submit" name="submit" value="Elegir direccion predeterminada" style="background-color:#d4e157;">Elegir direccion predeterminada</button>
</form>
</div>
</center>
<br><br>
<center>
<div id="contenido">
<script type="text/javascript">
	
			var lugar=document.getElementById("lugar").value
			var ciudad=document.getElementById("ciudad").value

			document.write('<iframe width="50%" height="400xp" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA4UlEJg5r21mDCZTKeulV80pq5mS-9WxE&q='+lugar+','+ciudad+'"></iframe>')


/*function buscar(){
			var lugar=document.getElementById("lugar").value
			var ciudad=document.getElementById("ciudad").value

			document.write('<iframe width="600xp" height="400xp" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDkISVOpSBCgDBIE-Qms0RltNejrc2pxVY&q='+lugar+','+ciudad+'"></iframe>')

          
		}

			$(document).ready(function borrar() {
  $('#limpiar').click(function() {
    $('input[type="text"]').val('');
  });
})
*/
		
	</script>
	</center>
</body>
</html>