<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style type="text/css">
	.cuadro{
		border: black 4px solid;
		width: 25%;
		display: inline-block;
	}
	.cuadro img{
		width: 200px;
		height: 200px;
	}
</style>
<body>
<br><br>
<h1>Catalogo de productos</h1>
<br>
<div>
	<?php 
	include ("articulo.php");
	$articulo=new Articulo();
	$resultados=$articulo->mostrar();
	while ($arti=mysqli_fetch_array($resultados)) {
	 ?>
	 <a href="ver_detalle.php?producto=<?=$arti['idproducto']?>">
	 <div class="cuadro">
	 	<figure>
	 		<img src="<?=$arti['foto']?>">
	 	 	<figcaption>
	 			<h3><?=$arti['nombre']?></h3>
	 			<?=$arti['precio']?>
	 		</figcaption>
	 	</figure>
	 </div>
	</a>
	<?php 
	 }
	 ?>
</div>
</body>
</html>