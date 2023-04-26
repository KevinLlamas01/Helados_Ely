<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <?php
 include("clases/categoria_producto.php");
 $categoria=new categoria();
 $arreglo=$categoria->mostrar();
include("header_ad.php");
 ?>
 <br><br>
 <center>
    <form class="col-3" style="background-color:pink;" action="funciones/insertar_productos.php" method="post" enctype="multipart/form-data">
    <div>
        <label>Nombre del producto</label><br>
        <input type="text" name="nom" id="" style="background-color: #fce4ec;">
    </div>

    <div>
        <label>Precio</label><br>
        <input type="number" name="precio" id="" style="background-color: #fce4ec;">
    </div>

    <div>
        <label>Descripcion</label><br>
        <input type="text" name="desc" id="" style="background-color: #fce4ec;">
    </div>

    <div>
        <label>Stock</label><br>
        <input type="text" name="stock" id="" style="background-color: #fce4ec;">
    </div>
    
    <div>
        <label>Foto</label><br>
        <input type="file" name="foto" id="">
    </div>

    <div>
        <div>Categorias</div>
        <select name="fk_categoria_producto" style="background-color: #fce4ec;">
            <option value="">
                Seleccione una opción 
            </option>

            <?php
            while ($fila=mysqli_fetch_array($arreglo)) {
            ?>
            <option value="<?=$fila['idcategoria_producto']?>"><?=$fila["nombre_cat"]?>
            <?php
            }
            ?>
        </select>
    </div>
<br>
    <div>
        <button type="submit" value="enviar" name="enviar" style="background-color:#F3FC64;">Enviar</button>
    </div>

    </form>
    </center>
</body>
</html>

<br><br><br>
 <?php 

include ('footer.php');
 ?>