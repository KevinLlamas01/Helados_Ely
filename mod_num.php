<?php
include("clases/telefono.php");
include("header_ad.php");
$categoria = new telefono();
$idtelefono = $_GET['idtelefono'];
$registro=$categoria->mostrarPorId($idtelefono);
$datos=mysqli_fetch_assoc($registro);

include("clases/Usuario.php");
 $usuario=new usuario();

 $arreglo=$categoria->mostrar();
?>
<br><br>
<center>
<form class="col-3" style="background-color:pink;" action="funciones/modificar_num.php" method="post" enctype="multipart/form-data">
    <div>
        <label>numero</label><br>
        <input type="text" name="numero" id="" value="<?=$datos['numero']?>" style="background-color: #fce4ec;">
    </div>

    <input type="hidden" name="idtelefono" value="<?=$datos['idtelefono']?>" style="background-color: #fce4ec;">

    <div>
        <div>Usuario</div>
        <select name="fk_usuario" style="background-color: #fce4ec;">
            <option value="">
                Seleccione una opción 
            </option>
            <?php
            while ($fila=mysqli_fetch_array($arreglo)) {
            ?>
            <option value="<?=$fila['idusuario']?>"><?=$fila["nombre"]?>
            <?php
            }
            ?>
        </select>
    </div>
<br>
    <div>
         <button type="submit" value="enviar" name="enviar" style="background-color:#F3FC64 ;" >Enviar</button>
    </div>
    </form>
    </center>