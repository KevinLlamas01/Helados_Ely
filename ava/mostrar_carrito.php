<?php
//session_start();
        
require 'config/config.php';
require 'config/conexion.php';
$db= new Database();
$con=$db->conectar();

if(!isset($_SESSION['e_mail'])){
    echo '
<script>
alert("Inicia sesion para ingresar a sus productos");
window.location = "../inicio_sesion.php";
</script>
    ';

    //header("location: inicio_sesion.php");
    die();
}
$productos=isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto'] : null;

$lista_carrito=array();

if($productos != null){
    foreach($productos as $clave => $cantidad){


$sql=$con->prepare("SELECT idproducto, nombre, precio, $cantidad AS cantidad FROM producto WHERE idproducto=? AND estatus=1");
$sql->execute([$clave]);
$lista_carrito[]=$sql->fetch(PDO::FETCH_ASSOC);
}
}
//  session_destroy();


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

<a href="../index.php"><img class="logo" src="../img/heladeri.png"></a>
<a class="letra" href="../index.php">Helados eli</a>
<a class="letra" href="../sobre_nos.php">Sobre nosotros</a>
<a class="letra" href="catalogo.php">Catalogo</a>



<a class="letra" href="../registro.php">Registro</a>


  <?php 
  if (isset($_SESSION['idusuario'])){
    if  ($_SESSION['tipo']==2){ 
      echo '<a class="navbar-brand" style="color:blueviolet;" href="index_ad.php" > Admin </a> ';
    }
  }else {
    echo '<a class="navbar-brand" href="inicio_sesion.php"> Inicio de sesion </a>';
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
           <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
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
                        <td><?php echo $precio; ?></td>
                        <td>
                            <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>"
                            size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
                        </td>
                        <td>
                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2, '.', '.');?></div>
                        </td>
                        <td><a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a></td> 
                    </tr>
                <?php } ?>

                <tr>
                <td colspan="3"></td> 
                <td colspan="2">   
                <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                </td>
                </tr>

                </tbody>
            <?php } ?>
            </table>
           </div>
           <div class="row">
            <div class="col-md-5 offset-md-7 d-grip gap-2 ">
                <a href="pago.php" class="btn btn-primary btn-lg">Realizar pago</a>
            </div>
               
           </div>
        </div>


    </main>

<!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminaModalLabel">Alerta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el producto de la lista?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>

    let eliminaModal=document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function(event){
            let button=event.relatedTarget
            let id= button.getAttribute('data-bs-id')
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
            buttonElimina.value=id 
          })

        function actualizaCantidad(cantidad, id){
            let url = 'clases/actualiza_carrito.php'
            let formData= new FormData()
            formData.append('id', id)
            formData.append('action', 'agregar')
            formData.append('cantidad', cantidad)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data=>{
                if(data.ok){

                    let divsubtotal = document.getElementById('subtotal_' + id)
                    divsubtotal.innerHTML = data.sub

                    let total=0.00
                    let lista = document.getElementsByName('subtotal[]')

                    for(let i=0; i < lista.length; i++){
                        total += parseFloat(lista[i].innerHTML.replace(/[$,]/g, ''))
                    }
                    total= new Intl.NumberFormat('en-US', {
                        minimumFractionDigits:2
                    }).format(total)
                    document.getElementById('total').innerHTML='<?php echo MONEDA; ?>' + total
                }
            })

        }

         function eliminar(){

            let botonElimina=document.getElementById('btn-elimina')
            let id = botonElimina.value

            let url = 'clases/actualiza_carrito.php'
            let formData= new FormData()
            formData.append('id', id)
            formData.append('action', 'eliminar')

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data=>{
                if(data.ok){
                     location.reload()                   
                }
            })

        }
    </script>
</body>

</html>

<br><br><br><br><br><br>
<?php 

include ('../footer.php');
 ?>