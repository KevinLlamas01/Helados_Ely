<?php
include("clases/categoria_producto.php");
include("header_ad.php");
$categoria = new categoria();
$idcategoria_producto = $_GET['idcategoria_producto'];

$registro=$categoria->mostrarPorId($idcategoria_producto);
$datos=mysqli_fetch_assoc($registro);
?>
<br><br><br>
<center>
<form class="col-3" style="background-color:pink;" action="funciones/modificar_cat.php" method="post" enctype="multipart/form-data">
    <div>
        <label>Nombre de la categoria</label><br>
        <input type="text" name="nom" id="" value="<?=$datos['nombre_cat']?>" style="background-color: #fce4ec;">
    </div>

    <input type="hidden" name="idcategoria_producto" value="<?=$datos['idcategoria_producto']?>" style="background-color: #fce4ec;">


    <div>
        <label>Foto</label><br>
        <input type="file" name="foto" id="" value="<?=$datos['foto']?>" style="background-color: #fce4ec;">
    </div>
    <div>
        <label>Descripcion</label><br>
        <input type="text" name="descripcion" id="" value="<?=$datos['descripcion']?>" style="background-color: #fce4ec;">
    </div>
    
    <div><br>
        <button type="submit" value="enviar" name="enviar" style="background-color:#F3FC64 ;" >Enviar</button>
    </div>
    </form>
    </center>