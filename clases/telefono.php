<?php	
class telefono
{
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($fecha,$numero,$fk_usuario){
   $consulta="INSERT INTO telefono(idtelefono,numero,estatus,fk_usuario)VALUES(null,'{$numero}',1,'{$usuario}')";
   $resultado=$this->conexion ->query ($consulta);
      return $resultado;
 }
 function mostrar(){

    $consulta="SELECT * FROM telefono t INNER JOIN usuario u ON u.idusuario=t.fk_usuario";
    $resultado=$this->conexion ->query ($consulta);
      return $resultado;
  }
  function baja ($idtelefono){
    $consulta="UPDATE telefono SET estatus=0 WHERE idtelefono='{$idtelefono}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }
  function alta ($idtelefono){
    $consulta="UPDATE telefono SET estatus=1 WHERE idtelefono='{$idtelefono}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function actualizar($idtelefono, $numero){
    $consulta="UPDATE telefono SET numero='{$numero}' WHERE idtelefono='{$idtelefono}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
  function mostrarPorId($idtelefono){
		$consulta="SELECT * FROM telefono WHERE idtelefono='{$idtelefono}' ";
		$respuesta=$this->conexion->query($consulta);
		return $respuesta;
	 }

}
?>