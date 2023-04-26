<?php
require 'config/config.php';
require 'config/conexion.php';
$db= new Database();
$con=$db->conectar();

$id=isset($_GET['id']) ? $_GET['id']  : '';
$token=isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token== ''){
    echo 'Error al procesar la peticion';
    exit;
}else{

    $token_tmp=hash_hmac('sha1', $id, KEY_TOKEN);

    if($token == $token_tmp){

        $sql=$con->prepare("SELECT count(idproducto) FROM producto WHERE idproducto=? AND estatus=1");
        $sql->execute([$id]);
        if  ($sql->fetchColumn() > 0){

            $sql = $con->prepare("SELECT nombre, descripcion, precio FROM producto WHERE idproducto=? AND estatus=1 LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $dir_imagenes='imagenes/producto/' . $id . '/';

            $rutaimg=$dir_imagenes . 'principal1.jpg';

            if (!file_exists($rutaimg)) {
                $rutaimg='imagenes/nofoto.png';
            }
            $imagenes=array();
            if(file_exists($dir_imagenes)){
            $dir=dir($dir_imagenes);
            while (($archivo=$dir->read()) !=false) {
                if($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo,'jpeg'))){    
                    $imagenes[]= $dir_imagenes . $archivo; 
                }
            }
         $dir->close();
        }
    }
    }else{
        echo 'Error al procesar la peticion';
    exit;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script type="text/javascript" src="js/bootstrap.js"></script>
    <title>INDEX1</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css?a=8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css?a=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <nav class="navbar" style="background-color: #F7DC6F ;">
  <div class="container-fluid">
     <style> @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap'); 
 </style>
 <style type="text/css">
      .letra{
        font-family: 'Fredoka One', cursive;
        color: black;
        font-size: 20;
      }
  </style>


<a href="index.php"><img class="logo" src="../img/heladeri.png"></a>
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
    echo '<a class="letra" href="inicio_sesion.php"> Inicio de sesion </a>';
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
          <div class="row">
            <div class="col-md-6 order-md-1">

                <div id="carouselImagenes" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $rutaimg; ?>" class="d-block w-100">
    </div>
       <?php foreach($imagenes as $img) { ?>
   <div class="carousel-item">
    <img src="<?php echo $img; ?>" class="d-block w-100">   
    </div>
     <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="carouselImagenes" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="carouselImagenes" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
            </div>
            <div class="col-md-6 order-md-2">
                <h2><?php echo $nombre; ?></h2>
                <h2> <?php echo MONEDA . $precio; ?></h2>
                <p class="lead">
                    <?php 
                        echo $descripcion; ?>
                </p>
                <div class="d-grid gap-3 col-10 mx-auto">
                    <button class="btn btn-primary" type="button" onclick="location.href='../direcciones.php'">Comprar ahora</button>
                    <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp;  ?>')">Agregar al carrito</button>
                </div>
            </div>
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
<br><br><br><br><br><br><br>
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