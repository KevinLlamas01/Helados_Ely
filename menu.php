<?php 
include('clases/categoria_producto.php');
$categoria=new categoria();
$registros=$categoria->mostrar();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css?a=3">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css?a=1">
  <nav class="navbar" style="background-color: #F7DC6F ;">
  <div class="container-fluid">
    <a href="index.php"><img class="logo" src="img/heladeri.png"></a>
<a class="navbar-brand"> 𝓗𝓮𝓵𝓪𝓭𝓸𝓼  𝓔𝓵𝓲</a>
<a class="navbar-brand"> Menu</a>
<a class="navbar-brand" href="sobre_nos.html">𝓢𝓸𝓫𝓻𝓮 𝓷𝓸𝓼𝓸𝓽𝓻𝓸𝓼</a>
<a href="carrito.php"><img class="logo" src="img/carri.png"></a>
</nav>
</div>
</head>

<style type="text/css">
  .card-group{
    display: inline-block;
    margin-left: 1%;

  }
</style>

<body style="background-color: #A3E4D7;">
  <br><br>
  <div>
    <?php 
while($fila=mysqli_fetch_array($registros)){
?>
 <div class="card-group" style="width:30%; height: 30%;">
  <div class="card" style="width: ; background-color: #0BE3A5;">
    <img src="img/<?=$fila['foto']?>" class="card-img-top" style="width:100%; height:100%; " alt="...">
    <div class="card-body">
      <h5 class="card-title"><?=$fila['nombre_cat']?></h5>
      <p class="card-text"><?=$fila['descripcion']?></p>
      <a href="catalogo.php?idcategoria=<?=$fila['idcategoria_producto']?>"> <button type="button" class="btn btn-outline-secondary" style="background-color:#F3FC64 ;">Ver</button></a>
    </div>
  </div>
</div>
    <?php 
}

?>
</div>



</body>
</html>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<footer style="background-color: #F7DC6F; margin-bottom: -10%;" >
  <ul>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <h6 class="text-muted lead">CONTACTO:</h6>
        <h6 class="text-muted"> El Rosario, Sinaloa<br>
          Teléfonos: 6692551445.<br>
        </h6>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="pull-right">
          <h6 class="text-muted lead">ENCUENTRANOS EN REDES SOCIALES</h6>
          <div class="redes-footer">
            <a href="https://www.facebook.com/rubeneduardo.perazaesquer"/><img src=img/fb.png style="width:50px; height:50px;"></a>
              <a href="https://www.facebook.com/rubeneduardo.perazaesquer"/><img src=img/ig.png style="width:50px; height:50px;"></a>

          </div>
        </div>
        <div class="row"> <p class="text-muted small text-right">Rubén Eduardo Peraza Esquer<br> Todos los derechos reservados 2022.</p></div>
        
      </div>
    </div>  
  </div>
</ul>
  </footer>