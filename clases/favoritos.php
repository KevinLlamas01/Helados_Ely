<?php	
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($fk_producto,$fk_usuario){
   $consulta="INSERT INTO favoritos(idfavoritos,fk_producto,fk_usuario,estatus)VALUES(null,'{$fk_producto}','{$fk_usuario}',1)";
   $resultado=$this->conexion ->query ($consulta);
      return $resultado;

 }
 function mostrar(){

    $consulta= $consulta="SELECT * FROM  producto p INNER JOIN  favoritos f ON  p.idproducto=f.fk_producto INNER JOIN  usuario u ON u.idusuario=f.fk_usuario";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function baja ($idfavoritos){
    $consulta="UPDATE idfavoritos SET estatus=0 WHERE idfavoritos='{$idfavoritos}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }
  function actualizar($idfavoritos, $fk_producto, $fk_usuario){
    $consulta="UPDATE favoritos SET fk_producto='{$fk_producto}', fk_usuario='{$fk_usuario}' WHERE idfavoritos='{$idfavoritos}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
?>