<?php

class venta
{
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($fecha,$subtotal,$total,$iva,$ganancia,$fk_carrito){
   $consulta="INSERT INTO venta(idventa,fecha,subtotal,total,iva,ganancia,fk_usuario,fk_carrito,estatus)VALUES(null,'{$fecha}','{$subtotal}','{$total}','{$iva}','{$ganancia}','{$fk_carrito}',1)";
   $resultado=$this->conexion ->query ($consulta);
      return $resultado;
 }
 function mostrar(){

    $consulta="SELECT * FROM domicilio d INNER JOIN usuario u ON d.fk_usuario=u.idusuario INNER JOIN venta v ON u.idusuario= v.fk_usuario INNER JOIN detalle_venta dv ON dv.fk_venta=v.idventa INNER JOIN producto p ON p.idproducto= dv.fk_producto";
    $resultado=$this->conexion ->query ($consulta);
    return $resultado;
  }

  function baja ($idventa){
    $consulta="UPDATE venta SET estatus=0 WHERE idventa='{$idventa}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }

  function actualizar($idventa, $fecha, $subtotal, $total, $iva,$fk_metodo_pago,$fk_carrito){
    $consulta="UPDATE venta SET fecha='{$fecha}', subtotal='{$subtotal}', total='{$total}', iva='{$iva}',fk_metodo_pago='{$fk_metodo_pago}',fk_carrito='{$fk_carrito}' WHERE idventa='{$idventa}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function gananciaHoy(){
    $consulta="SELECT sum(ganancia)from venta where fecha=date(NOW())";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function gananciaFechaSeleccionada($fecha){
    $consulta="SELECT sum(ganancia)from venta where fecha=$fecha";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function gananciaFechaEntreOtra($fecha1,$fecha2){
    $consulta="SELECT sum(ganancia)from venta where fecha>$fecha1 && fecha<$fecha2";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function gananciayear($year){
    $consulta="SELECT sum(ganancia)from venta where YEAR(fecha)=$year";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
}
?>