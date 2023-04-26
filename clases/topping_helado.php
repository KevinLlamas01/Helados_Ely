<?php	
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($fk_detalle_venta,$fk_topping){
   $consulta="INSERT INTO topping_helado(idtopping_helado,fk_topping,fk_detalle_venta)VALUES(null,'{$fk_topping}','{$fk_detalle_venta}')";
   $resultado=$this->conexion ->query ($consulta);
    return $resultado;

 }
 function mostrar(){

    $consulta="SELECT * FROM detalle_venta dv INNER JOIN topping_helado th ON th.fk_detalle_venta=dv.iddetalle_venta INNER JOIN topping t ON t.idtopping=th.fk_topping";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function actualizar($idtopping_helado, $fk_detalle_venta, $fk_topping){
    $consulta="UPDATE topping_helado SET fk_detalle_venta='{$fk_detalle_venta}', fk_topping='{$fk_topping}'  WHERE idcarrito='{$idcarrito}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
?>