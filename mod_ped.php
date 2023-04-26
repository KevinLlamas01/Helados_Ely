<?php
include("clases/pedido.php");
include("header_ad.php");
$categoria = new pedido();
$idpedido = $_GET['idpedido'];

$registro=$categoria->mostrarPorId($idpedido);
$datos=mysqli_fetch_assoc($registro);
?>
<br><br><br>
<center>
<form class="col-3" style="background-color:pink;" action="funciones/modificar_ped.php" method="post" enctype="multipart/form-data">
    <div>
        <label>Codigo del pedido</label><br>
        <input type="text" name="codigo_pedido" id="" value="<?=$datos['codigo_pedido']?>" style="background-color: #fce4ec;">
    </div>

    <input type="hidden" name="idpedido" value="<?=$datos['idpedido']?>" style="background-color: #fce4ec;">

    <div>
        <label>Fecha de entrega</label><br>
        <input type="text" name="fecha_entrega" id="" value="<?=$datos['fecha_entrega']?>" style="background-color: #fce4ec;">
    </div>
    
    <div>
        <button type="submit" value="enviar" name="enviar" style="background-color:#F3FC64 ;" >Enviar</button>
    </div>

    </form>
    </center>