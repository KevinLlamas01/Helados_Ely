<?php
include("clases/producto.php");
include("header_ad.php");
$categoria = new producto();
$idproducto = $_GET['idproducto'];

$registro=$categoria->mostrarPorId($idproducto);
$datos=mysqli_fetch_assoc($registro);
?>
<br><br><br>
<center>
<form class="col-3" style="background-color:pink;" action="funciones/modificar.php" method="post" enctype="multipart/form-data">
    <div>
        <label>Nombre del producto</label><br>
        <input type="text" name="nom" id="" value="<?=$datos['nombre']?>" style="background-color: #fce4ec;">
    </div>

    <input type="hidden" name="idproducto" value="<?=$datos['idproducto']?>" style="background-color: #fce4ec;">

    <div>
        <label>Precio</label><br>
        <input type="number" name="precio" id="" value="<?=$datos['precio']?>" style="background-color: #fce4ec;">
    </div>

    <div>
        <label>Descripcion</label><br>
        <input type="text" name="desc" id="" value="<?=$datos['descripcion']?>" style="background-color: #fce4ec;">
    </div>

    <div>
        <label>Stock</label><br>
        <input type="text" name="stock" id="" value="<?=$datos['stock']?>" style="background-color: #fce4ec;">
    </div>
    
    <div>
        <label>Foto</label><br>
        <input type="file" name="foto" id="" value="<?=$datos['foto']?>" style="background-color: #fce4ec;">
    </div>
    
    <div><br>
        <button type="submit" value="enviar" name="enviar" style="background-color:#F3FC64 ;" >Enviar</button>
    </div>

    </form>
    </center>