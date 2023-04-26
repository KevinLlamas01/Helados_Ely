<?php 
include ('header.php');
include('clases/categoria_producto.php');
include ('clases/producto.php');
$categoria=new categoria();
$producto=new producto();
$registros=$categoria->mostrar();
 ?>

<style type="text/css">
  .card-group{
    display: inline-block;
    margin-left: 1%;
  }
 
</style>
<!--Cuerpo (carrucel)-->
<br>

  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
          <a href="ava/catalogo.php"><img src="img/vainilla.webp" width="500px" height="500px" class="d-block w-100" alt="">  
      </div>
      <div class="carousel-item">
        <a href="ava/catalogo.php"><img src="img/nieve_chocolate.webp" width="500px" height="500px" class="d-block w-100" alt="..."> 
      </div>
      <div class="carousel-item">
        <a href="ava/catalogo.php"><img  src="img/oreo.webp"  width="500px" height="500px" class="d-block w-100" alt="..."  >
</a>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!--Fin del carrusel-->

<br><br><br><br><br><br><br>

<?php  
     			 while($fila=mysqli_fetch_array($registros)) {
            $PopuProduct=$producto->mostrarPopular($fila['idcategoria_producto']);
            $descripcion=mysqli_fetch_assoc($PopuProduct);
 				?>
    <div class="card-group" style="width:30%; height: 45%;">
  <div class="card" style="width: ; background-color: #0BE3A5; height:450px">
    <img  style="height:200px;" src="img/<?=$descripcion['foto']?>" class="card-img-top"   alt="...">
    <div class="card-body">
      <h5 class="card-title"><?=$fila['nombre_cat']?> populares</h5>
      <p class="card-text"><?=$descripcion['descripcion']?></p>
      <p class="card-text"><small class="text-muted"><?=$descripcion['precio']?></small></p>
      <a href="ava/catalogo.php?idproducto=<?=$descripcion['idproducto']?>"> <button type="button" class="btn btn-outline-secondary" style="background-color:#F3FC64 ;">Menu</button></a>
    </div>
  </div>
</div>
<?php  
           }
 				?>


<br><br><br><br><br>
<?php 

include ('footer.php');
 ?>
</body>




