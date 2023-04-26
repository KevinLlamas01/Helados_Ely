<?php	
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($tipo_pago){
   $consulta="INSERT INTO metodo_pago (idmetodo_pago,tipo_pago,estatus)VALUES(null,'{$tipo_pago}',1)";
   $resultado=$this->conexion ->query ($consulta);
      return $resultado;

 }

 function mostrar(){

    $consulta="SELECT * FROM  metodo_pago";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function baja ($idmetodo_pago){
    $consulta="UPDATE metodo_pago SET estatus=0 WHERE idmetodo_pago='{$idmetodo_pago}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }
  function actualizar($idmetodo_pago, $tipo_pago){
    $consulta="UPDATE metodo_pago SET tipo_pago='{$tipo_pago}',1 WHERE idmetodo_pago='{$metodo_pago}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
?>