<?php  include('../header.php'); ?>
<!DOCTYPE html>
<html>
<?php
include 'seleccionar_predeterminado.php';
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


	<form method="POST" action="guardar.php">
<input type="text" required name="calle_numero" placeholder="Calle y numero" value="<?php echo $calle_numero;?>" id = "lugar">
<br><br>
<input type="text" required name="cod_p" placeholder="Codigo postal" value="<?php  echo $cod_p;?>" id="lugar">
<br><br>
<input type="text" required name="colonia" placeholder="Colonia" value="<?php echo $colonia;?>" id="lugar">
<br><br>
<input type="text" name="ciudad" value="Escuinapa de Hidalgo" disabled id="ciudad">
<br><br>
<input type="text" name="descripcion" placeholder="Ingresar numero de casa, señalamientos, etc. (opcional)" width="200px" height="200px" id="descripcion">
<br><br>

<!--Botones:-->
<input type="submit" name="submit" value="Enviar datos" onclick="buscar()">
<input type="submit" name="submit" value="Guardar como direccion predeterminada" formaction="predeterminado.php">
<input type="submit" value="ver en el mapa" id="busca" formaction="buscar_mapa.php">
<button name="borrar"><a href="avance_ely.php">Borrar informacion</a></button>
</form>

<form action="seleccionar.php">
<input type="submit" name="submit" value="Elegir direccion predeterminada">
</form>

<div id="contenido">
<script type="text/javascript">
	
			var lugar=document.getElementById("lugar").value
			var ciudad=document.getElementById("ciudad").value

			document.write('<iframe width="600xp" height="400xp" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA4UlEJg5r21mDCZTKeulV80pq5mS-9WxE&q='+lugar+','+ciudad+'"></iframe>')


function buscar(){
			var lugar=document.getElementById("lugar").value
			var ciudad=document.getElementById("ciudad").value

			document.write('<iframe width="600xp" height="400xp" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDkISVOpSBCgDBIE-Qms0RltNejrc2pxVY&q='+lugar+','+ciudad+'"></iframe>')

          
		}

			$(document).ready(function borrar() {
  $('#limpiar').click(function() {
    $('input[type="text"]').val('');
  });
})

		
	</script>
</body>
</html>

<?php 

include ('footer.php');
 ?>