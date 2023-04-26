<?php
    include("../clases/producto.php");

    $producto = new producto();



   $nombre = $_POST["nom"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["desc"];
    $stock = $_POST["stock"];
    $fk_categoria = $_POST["fk_categoria_producto"];

    $archi_foto=$_FILES["foto"]["tmp_name"];
    $nombre_foto=$_FILES["foto"]["name"];

move_uploaded_file($archi_foto, "../img/".$nombre_foto);



    if (!empty($_POST["enviar"])) {
        if (empty($_POST["nom"]) or empty($_POST["precio"]) or empty($_POST["desc"]) or empty($_POST["stock"])) {
           // echo "<meta http-equiv='REFRESH' content='0; url=../formulario_registro_helados.php'> <script> alert('porfavor inserte toda la informacion requerida a los campos') </script>";
        } else {
            $respuesta=$producto->insertar($nombre, $precio, $descripcion, $stock, $nombre_foto, $fk_categoria);
    
            echo "<meta http-equiv='REFRESH' content='0; url=../formulario_registro_helados.php'> <script> alert('Los productos se registraron correctamente') </script>";
        }
    }
    
?>