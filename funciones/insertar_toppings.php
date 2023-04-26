<?php
    include("../clases/toppings.php");

    $producto = new toppings();



   $nombre = $_POST["nom"];
    $precio = $_POST["precio"];
    $archi_foto=$_FILES["foto"]["tmp_name"];
    $nombre_foto=$_FILES["foto"]["name"];

move_uploaded_file($archi_foto, "../img/".$nombre_foto);



    if (!empty($_POST["enviar"])) {
        if (empty($_POST["nom"]) or empty($_POST["precio"])) {
           // echo "<meta http-equiv='REFRESH' content='0; url=../formulario_registro_helados.php'> <script> alert('porfavor inserte toda la informacion requerida a los campos') </script>";
        } else {
            $respuesta=$producto->insertar($nombre, $precio, $nombre_foto);
    
            echo "<meta http-equiv='REFRESH' content='0; url=../formulario_toppings.php'> <script> alert('Los toppings se registraron correctamente') </script>";
        }
    }
    
?>