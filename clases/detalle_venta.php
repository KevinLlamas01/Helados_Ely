<?php	
class detalle
{
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($fk_venta,$fk_producto,$fk_toppings,$cantidad){
   $consulta="INSERT INTO detalle_venta(iddetalle_venta,fk_venta,fk_producto,fk_toppings,cantidad)VALUES(null,'{$fk_venta}','{$fk_producto}','{$fk_toppings}','{$cantidad}')";
   $resultado=$this->conexion ->query ($consulta);
      return $resultado;
 }
 function mostrar(){

    $consulta="SELECT * FROM  venta v INNER JOIN  detalle_venta dv ON  v.idventa=dv.fk_venta INNER JOIN producto p ON p.idproducto=dv.fk_producto";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  
  function actualizar($iddetalle_venta, $fk_venta, $fk_producto, $cantidad){
    $consulta="UPDATE detalle_venta SET fk_venta='{$fk_venta}', fk_producto='{$fk_producto}', cantidad='{$cantidad}' WHERE iddetalle_venta='{$iddetalle_venta}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
}
?>