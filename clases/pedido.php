<?php	

class pedido
{
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($codigo_pedido,$fecha_entrega,$fk_venta){
   $consulta="INSERT INTO pedido(idpedido,codigo_pedido,fecha_entrega,fk_venta,estatus)VALUES(null,'{$codigo_pedido}','{$fecha_entrega}','{$fk_cantidad}',1)";
   $resultado=$this->conexion ->query ($consulta);
    return $resultado;

 }
 function mostrar(){

    $consulta="SELECT * FROM pedido p INNER JOIN venta v ON p.fk_venta=v.idventa ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function baja ($idpedido){
    $consulta="UPDATE pedido SET estatus=0 WHERE idpedido='{$idpedido}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }
  function actualizar($idpedido, $codigo_pedido, $fecha_entrega){
    $consulta="UPDATE pedido SET codigo_pedido='{$codigo_pedido}', fecha_entrega='{$fecha_entrega}' WHERE idpedido='{$idpedido}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function alta ($idpedido){
    $consulta="UPDATE pedido SET estatus=1 WHERE idpedido='{$idpedido}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }

  function mostrarPorId($idpedido){
		$consulta="SELECT * FROM pedido WHERE idpedido='{$idpedido}' ";
		$respuesta=$this->conexion->query($consulta);
		return $respuesta;
	 }  
}
?>