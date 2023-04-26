<?php
include("header_ad.php");
?>

<br><br>
<center>
<form class="col-3" style="background-color:pink;" action="insertar_toppings.php" method="post" enctype="multipart/form-data">
    <div>
        <label>Nombre del producto</label><br>
        <input type="text" name="nom" id="" style="background-color: #fce4ec;">

    </div>

    <div>
        <label>Precio</label><br>
        <input type="number" name="precio" id="" style="background-color: #fce4ec;">
    </div>
    
    <div>
        <label>Foto</label><br>
        <input type="file" name="foto" id="" >
    </div>

   
    <div>
      <br>
         <button type="submit" value="enviar" name="enviar" style="background-color:#F3FC64 ;">Enviar</button>
    </div>

    </form>
    </center>
    <br><br><br>
    <?php 

include ('footer.php');
 ?>