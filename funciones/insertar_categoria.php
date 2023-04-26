<?php
    include("../clases/categoria_producto.php");

    $producto = new categoria();



   $nombre = $_POST["nom"];
   $descripcion = $_POST["descripcion"];
    $archi_foto=$_FILES["foto"]["tmp_name"];
    $nombre_foto=$_FILES["foto"]["name"];

move_uploaded_file($archi_foto, "../img/".$nombre_foto);



    if (!empty($_POST["enviar"])) {
        if (empty($_POST["nom"])) {
           // echo "<meta http-equiv='REFRESH' content='0; url=formulario_registro_helados.php'> <script> alert('porfavor inserte toda la informacion requerida a los campos') </script>";
        } else {
            $respuesta=$producto->insertar($nombre,$descripcion, $nombre_foto);
    
            echo "<meta http-equiv='REFRESH' content='0; url=../formulario_registro_categoria.php'> <script> alert('Los productos se registraron correctamente') </script>";
        }
    }
    
?>