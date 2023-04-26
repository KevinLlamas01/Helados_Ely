<?php	

class toppings
{
  
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($nom,$precio,$foto){
    $consulta="INSERT INTO topping(idtopping, nombre, precio, estatus, foto) VALUES (null,'{$nom}','{$precio}',1,'{$foto}')";
    $resultado=$this->conexion ->query ($consulta);
       return $resultado;
 
  }

 function mostrar(){

    $consulta="SELECT * FROM  topping";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }


  function baja ($idtopping){
    $consulta="UPDATE topping SET estatus=0 WHERE idtopping='{$idtopping}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }
  function actualizar($idtopping, $nombre,$precio, $foto){
    $consulta="UPDATE topping SET nombre='{$nombre}',precio='{$precio}', foto='{$foto}' WHERE idtopping='{$idtopping}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function alta ($idtopping){
    $consulta="UPDATE topping SET estatus=1 WHERE idtopping='{$idtopping}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }

  function mostrarPorId($idtopping){
		$consulta="SELECT * FROM topping WHERE idtopping='{$idtopping}' ";
		$respuesta=$this->conexion->query($consulta);
		return $respuesta;
	 }
}



