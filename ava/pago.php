<?php
require 'config/config.php';
require 'config/conexion.php';
$db= new Database();
$con=$db->conectar();

$productos=isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto'] : null; 
$lista_carrito=array();

if($productos != null){
    foreach($productos as $clave => $cantidad){


$sql=$con->prepare("SELECT idproducto, nombre, precio, $cantidad AS cantidad FROM producto WHERE idproducto=? AND estatus=1");
$sql->execute([$clave]);
$lista_carrito[]=$sql->fetch(PDO::FETCH_ASSOC);
}
}else{
    header("Location : index.php");
    exit;
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

<a href="../index.php"><img width="60px" class="../logo" src="../img/heladeri.png"></a>
<a class="navbar-brand" href="../index.php">Helados eli</a>
<a class="navbar-brand" href="../sobre_nos.php">Sobre nosotros</a>
<a class="navbar-brand" href="catalogo.php">Catalogo</a>



<a class="navbar-brand" href="../registro.php">Registro</a>


  <?php 
  if (isset($_SESSION['idusuario'])){
    if  ($_SESSION['tipo']==2){ 
      echo '<a class="navbar-brand" style="color:blueviolet;" href="index_ad.php" > Admin </a> ';
    }
  }else {
    echo '<a class="navbar-brand" href="inicio_sesion.php"> Inicio de sesion </a>';
  }
   ?>


<a class="navbar-brand"  href="funciones/cerrar_sesion.php"><?php  if (isset($_SESSION['idusuario'])){   echo $_SESSION['nombre'];}  ?></a>

<a href="mostrar_carrito.php" class="btn btn-primary">
                    Carrito<span id="num_cart" class="badge bg-secondary"></span>
                </a>


</nav>

</head>

<body>

    <!--Contenido-->
    <main>
        <div class="container">

            <div class="row">
                <div class="col-6">
                    <h4>Detalles de pago</h4>
                    <div id="paypal-button-container"></div>
                </div>
            <div class="col-6">
           <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista_carrito == null){
                        echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                    }else{
                            $total=0;
                            foreach($lista_carrito as $producto){
                                $_id=$producto['idproducto'];
                                $nombre=$producto['nombre'];
                                $precio=$producto['precio'];
                                $cantidad=$producto['cantidad'];
                                $subtotal=$precio * $cantidad;
                                $total += $subtotal;
                            
                     ?>
                    <tr>
                        <td><?php echo $nombre; ?></td>
                        <td>
                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2, '.', '.');?></div>
                        </td>
                    </tr>
                <?php } ?>

                <tr>
                <td colspan="2">   
                <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                </td>
                </tr>

                </tbody>
            <?php } ?>
            </table>
           </div>
           </div>
        </div>
    </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
    <script>
        paypal.Buttons({
            style:{
                color:'blue',
                shape:'pill',
                label:'pay'
            },
            createOrder : function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value:<?php echo $total; ?>
                        }
                    }]
                });
            },
            onApprove: function(data, actions){
                let URL= 'clases/captura.php'
                actions.order.capture().then(function(detalles){

                    console.log(detalles);

                    return fetch(URL, {
                        method: 'POST',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    })
                });
            },
            onCancel: function(data){
                alert("Pago cancelado");
                console.log(data);
            } 
        }).render('#paypal-button-container')
    </script>

    <button class="btn btn-primary" type="button" onclick="location.href='../direcciones.php'">Comprar ahora</button>
</body>

</html>