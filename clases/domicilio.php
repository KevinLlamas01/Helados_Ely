<?php	
class domicilio
{
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($calle_numero,$colonia,$cp,$fk_usuario){
   $consulta="INSERT INTO domicilio(iddomicilio,fecha,numero,estatus,fk_usuario)VALUES(null,'{$numero}',1,'{$usuario}')";
   $resultado=$this->conexion ->query ($consulta);
      return $resultado;
 }
 function mostrar(){

    $consulta="SELECT  * FROM domicilio d INNER JOIN  usuario u ON  u.idusuario=d. fk_usuario";
    $resultado=$this->conexion ->query ($consulta);
      return $resultado;
  }
  function baja ($iddomicilio){
    $consulta="UPDATE domicilio SET estatus=0 WHERE iddomicilio='{$iddomicilio}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }
  function actualizar($iddomicilio, $calle, $cod_p, $colonia){
    $consulta="UPDATE domicilio SET calle_numero='{$calle}', cod_p='{$cod_p}', colonia='{$colonia}' WHERE iddomicilio='{$iddomicilio}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function alta ($iddomicilio){
    $consulta="UPDATE domicilio SET estatus=1 WHERE iddomicilio='{$iddomicilio}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;  
  }

  function mostrarPorId($iddomicilio){
		$consulta="SELECT * FROM domicilio WHERE iddomicilio='{$iddomicilio}' ";
		$respuesta=$this->conexion->query($consulta);
		return $respuesta;
	 }  
}
?>