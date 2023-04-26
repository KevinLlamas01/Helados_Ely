<!DOCTYPE html>
<html>
<head>

	<?php

	include ('header.php');

if(!isset($_SESSION['e_mail'])){
    echo '
<script>
alert("Primero debe de iniciar sesion para comprar cualquier producto");
window.location = "inicio_sesion.php";
</script>
    ';
    session_destroy();
    die();
}

	

 ?>
 <?php

 

 ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>

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
	<br><br>
<style type="text/css">
	.in{
		width: 47%;
	}
</style>
<center>
	<div class="col-8" style="background-color:pink;">
		<br>
	<form  method="POST" action="funciones/guardar_direcciones.php">

<input class="in" type="text" required name="calle_numero" placeholder="Calle" value="
" id = "lugar" style="background-color:#fbe9e7;">
<br><br>
<input class="in" type="number" required name="cod_p" placeholder="Codigo postal" value="" id="lugar" style="background-color:#fbe9e7;">
<br><br>
<input class="in" type="text" required name="colonia" placeholder="Colonia" id="lugar" style="background-color:#fbe9e7;" >
<br><br>
<input class="in" type="text" name="ciudad" value="Escuinapa de Hidalgo" disabled id="ciudad" style="background-color:#fbe9e7;">
<br><br>

<input class="in" type="text" name="descripcion" placeholder="Ingresar numero de casa, señalamientos, etc. (opcional)" id="descripcion" style="background-color:#fbe9e7;">
<br><br>
<!--Botones:-->

<button type="submit" name="submit" onclick="buscar()" button style="background-color:#d4e157;">Enviar datos</button>

<button type="submit" name="submit" value="Guardar como direccion predeterminada" formaction="funciones/direccion_predeterminada.php" style="background-color:#d4e157;">Guardar como direccion predeterminada</button>

<button type="submit" name="buscar" value="Buscar en el mapa" formaction="funciones/mapa.php" style="background-color:#d4e157;">Buscar en el mapa</button>
<button type="reset" name="resetear" value="Borrar informacion" style="background-color:#d4e157;">Borrar informacion</button>
</form>

<form action="seleccionar.php">
<button type="submit" name="submit" value="Elegir direccion predeterminada" style="background-color:#d4e157;">Elegir direccion predeterminada</button>
</form>
<br>
</div>
</center>
<!--Lo siguiente es para solo recargar una parte de la pagina-->
<!--<script type="text/javascript">
	$(document).ready(function(){
		$("#busca").click(function(){
        $("#contenido").load("avance_ely.php")
		});
	});
</script>-->

<!--El mapa:-->
<br><br>
<center>
<div id="contenido">
<script type="text/javascript">
	
			var lugar=document.getElementById("lugar").value
			var ciudad=document.getElementById("ciudad").value

			document.write('<iframe width="50%" height="400px" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDkISVOpSBCgDBIE-Qms0RltNejrc2pxVY&q='+lugar+','+ciudad+'"></iframe>')

	/*	function buscar(){
			var lugar=document.getElementById("lugar").value
			var ciudad=document.getElementById("ciudad").value

			document.write('<iframe width="600xp" height="400xp" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDkISVOpSBCgDBIE-Qms0RltNejrc2pxVY&q='+lugar+','+ciudad+'"></iframe>')

		}
		*/
	</script>

</div>
</center>
<!--Lo siguiente es de mapas:-->
 
    <!--Api key: AIzaSyDkISVOpSBCgDBIE-Qms0RltNejrc2pxVY -->
</body>
</html>
<?php 

include ('footer.php');
 ?>