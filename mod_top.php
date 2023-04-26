<?php
include("clases/toppings.php");
include("header_ad.php");
$categoria = new toppings();
$idtopping = $_GET['idtopping'];

$registro=$categoria->mostrarPorId($idtopping);
$datos=mysqli_fetch_assoc($registro);
?>
<br><br>
<center>
<form class="col-3" style="background-color:pink;" action="funciones/modificar_top.php" method="post" enctype="multipart/form-data">
    <div>
        <label>Nombre</label><br>
        <input type="text" name="nom" id="" value="<?=$datos['nombre']?>" style="background-color: #fce4ec;">
    </div>

    <input type="hidden" name="idtopping" value="<?=$datos['idtopping']?>" style="background-color: #fce4ec;">

    <div>
        <label>Precio</label><br>
        <input type="number" name="precio" id="" value="<?=$datos['precio']?>" style="background-color: #fce4ec;">
    </div>

    <div>
        <label>Foto</label><br>
        <input type="file" name="foto" id="" value="<?=$datos['foto']?>" style="background-color: #fce4ec;">
    </div>
    
    <div>
         <button type="submit" value="enviar" name="enviar" style="background-color:#F3FC64 ;" >Enviar</button>
    </div>

    </form>
</center>