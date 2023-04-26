<?php
include("clases/domicilio.php");
include("header_ad.php");
$domicilio = new domicilio();
$iddomicilio = $_GET['iddomicilio'];

$registro=$domicilio->mostrarPorId($iddomicilio);
$datos=mysqli_fetch_assoc($registro);
?>
<br><br>
<center>
<form class="col-3" style="background-color:pink;" action="funciones/modificar_dom.php" method="post" enctype="multipart/form-data">
    <div>
        <label>Calle</label><br>
        <input type="text" name="calle_numero" id="" value="<?=$datos['calle_numero']?>"style="background-color: #fce4ec;">
    </div>

    <input type="hidden" name="iddomicilio" value="<?=$datos['iddomicilio']?>" style="background-color: #fce4ec;">

    <div>
        <label>Codigo postal</label><br>
        <input type="number" name="cod_p" id="" value="<?=$datos['cod_p']?>" style="background-color: #fce4ec;">
    </div>

    <div>
        <label>colonia</label><br>
        <input type="text" name="colonia" id="" value="<?=$datos['colonia']?>" style="background-color: #fce4ec;">
    </div>
    
    <div><br>
         <button type="submit" value="enviar" name="enviar" style="background-color:#F3FC64 ;" >Enviar</button>
    </div>

    </form>
    </center>