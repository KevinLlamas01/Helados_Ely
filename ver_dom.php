<?php
include("header_ad.php");
require_once("clases/domicilio.php");
$mostrar=new domicilio();
$ver=$mostrar->mostrar();
 ?>

 <br><br><br>
 <div class="container">
   <table class="table table-striped" style="background-color:#f8bbd0;">
       <th>Calle</th>
       <th>Codigo postal</th>
       <th>Colonia</th>
       <th>Estatus</th>
      <th> Usuario </th>
       <th>Opciones</th>
       <?php
       while ($fila=mysqli_fetch_array($ver)){
       ?>
      <tr>
        <td> <?=$fila["calle_numero"]?> </td>
        <td> <?=$fila["cod_p"]?> </td>
        <td> <?=$fila["colonia"]?> </td>
        <td> <?=$fila["Estatus"]?> </td>
        <td> <?=$fila["nombre"]?> </td>
        <td>
        <a href="mod_dom.php?iddomicilio=<?=$fila["iddomicilio"]?>"><button style="background-color:white;">Modificar</a></button><br>
        <a href="funciones/baja_dom.php?iddomicilio=<?=$fila["iddomicilio"]?>"><button style="background-color:white;">Dar de baja</a></button><br>
        <a href="funciones/alta_dom.php?iddomicilio=<?=$fila["iddomicilio"]?>"> <button style="background-color:white;">Dar de alta</a></button>
        </td>
      </tr>
      <?php
       }
       ?>
     </table>
   </div>
     <br><br><br><br><br><br><br><br>
 <?php 

include ('footer.php');
 ?>