<?php
require 'config/config.php';
require 'config/conexion.php';
$db= new Database();
$con=$db->conectar();

$sql=$con->prepare("SELECT idproducto, nombre, precio FROM producto WHERE estatus=1");
$sql->execute();
$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
if (!isset($_SESSION['idusuario'])) {
  echo "<meta http-equiv='REFRESH' content='0; url=../inicio_sesion.php?'> <script> alert('Para vizualizar productos y hacer compras inicia sesion') </script>";

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script type="text/javascript" src="js/bootstrap.js"></script>
    <title>INDEX1</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css?a=6">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css?a=1">
    <style> @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap'); 
</style>
<style type="text/css">
      .letra{
        font-family: 'Fredoka One', cursive;
        color: black;
        font-size: 20;
      }
  </style>
  <nav class="navbar" style="background-color: #F7DC6F ;">
  <div class="container-fluid">

<a href="../index.php"><img class="logo" src="../img/heladeri.png"></a>
<a class="letra" href="../index.php">Helados eli</a>
<a class="letra" href="../sobre_nos.php">Sobre nosotros</a>
<a class="letra" href="catalogo.php">Catalogo</a>



<a class="letra" href="../registro.php">Registro</a>


  <?php 
  if (isset($_SESSION['idusuario'])){
    if  ($_SESSION['tipo']==2){ 
      echo '<a class="letra" style="color:blueviolet;" href="index_ad.php" > Admin </a> ';
    }
  }else {
    echo '<a class="letra" href="../inicio_sesion.php"> Inicio de sesion </a>';
  }
   ?>


<a class="letra"  href="funciones/cerrar_sesion.php"><?php  if (isset($_SESSION['idusuario'])){   echo $_SESSION['nombre'];}  ?></a>

<a href="mostrar_carrito.php" class="btn btn-primary">
                    Carrito<span id="num_cart" class="badge bg-secondary"></span>
                </a>

</nav>

</head>

<body style="background-color: #A3E4D7;">

    <!--Contenido-->
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($resultado as $row) { ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <?php 
                            $id=$row['idproducto'];
                            $imagen="imagenes/producto/" . $id . "/principal1.jpg";

                            if (!file_exists($imagen)){
                                $imagen="imagenes/nofoto.png"; 
                            }

                         ?>
                        <img src="<?php echo $imagen; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                            <p class="card-text"><?php echo $row['precio']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="detalles.php?id=<?php echo $row['idproducto']; ?>&token=<?php echo hash_hmac('sha1', $row['idproducto'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                                </div>

                                
                                <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $row['idproducto']; ?>, '<?php echo hash_hmac('sha1', $row['idproducto'], KEY_TOKEN); ?>')">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function addProducto(id, token){
            let url = 'clases/carrito.php'
            let formData= new FormData()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data=>{
                if(data.ok){
                    let elemento= document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })

        }
    </script>
</body>

</html>
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
            <a href="https://www.facebook.com/rubeneduardo.perazaesquer"/><img src=../img/fb.png style="width:50px; height:50px;"></a>
              <a href="https://www.facebook.com/rubeneduardo.perazaesquer"/><img src=../img/ig.png style="width:50px; height:50px;"></a>

          </div>
        </div>
        <div class="row"> <p class="text-muted small text-right">Rubén Eduardo Peraza Esquer<br> Todos los derechos reservados 2022.</p></div>
        
      </div>
    </div>  
  </div>
</ul>
  </footer>