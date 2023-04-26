<?php
include("header_ad.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <br><br><br><br>

        <center>
            <div class="col-3" style="background-color:pink;">
    <form action="funciones/insertar_categoria.php" method="post" enctype="multipart/form-data">
        
    <div>
        <label>Nombre de la categoria</label><br>
        <input type="text" name="nom" id="" style="background-color: #fce4ec;">
    </div>
    <div>
        <label>Foto</label><br>
        <input type="file" name="foto" id="">
    </div>
    <div><br><br>
        <button type="submit" value="enviar" name="enviar" style="background-color:#F3FC64 ;" >Enviar</button>
       
    </div>

    </form>
    </center>
    </div>

</body>
</html>
<br><br><br>
 <?php 

include ('footer.php');
 ?>