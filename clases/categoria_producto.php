<?php	

class categoria
{
  
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($nombre_cat,$descripcion,$foto){
   $consulta="INSERT INTO categoria_producto(idcategoria_producto,nombre_cat,foto,descripcion,estatus)VALUES(null,'{$nombre_cat}','{$foto}','{$descripcion}',1)";
   $resultado=$this->conexion ->query ($consulta);
      return $resultado;

 }
 function mostrar(){

    $consulta="SELECT * FROM  categoria_producto";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function baja ($idcategoria_producto){
    $consulta="UPDATE categoria_producto SET estatus=0 WHERE idcategoria_producto='{$idcategoria_producto}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }
  function actualizar($idcategoria_producto,$nombre,$foto,$descripcion){
    $consulta="UPDATE categoria_producto SET nombre_cat='{$nombre}', foto='{$foto}', descripcion='{$descripcion}' WHERE idcategoria_producto='{$idcategoria_producto}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function alta ($idcategoria_producto){
    $consulta="UPDATE categoria_producto SET estatus=1 WHERE idcategoria_producto='{$idcategoria_producto}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }

  function mostrarPorId($idcategoria_producto){
		$consulta="SELECT * FROM categoria_producto WHERE idcategoria_producto='{$idcategoria_producto}'";
		$respuesta=$this->conexion->query($consulta);
		return $respuesta;

}

}
?>