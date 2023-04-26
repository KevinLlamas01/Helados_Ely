<?php 

class usuario
{
  
  function __construct()
  {
    require_once("Conexion.php");
    $this->conexion = new conexion();
  }

      //Para buscar todos los daTo de la tabla  para poder registrarse
  function insertar($nombre,$apellidos,$e_mail,$contraseña){
   $consulta="INSERT INTO usuario (idusuario,nombre,apellidos,e_mail,contraseña,tipo,estatus)VALUES(null,'{$nombre}','{$apellidos}','{$e_mail}','{$contraseña}',1, 1)";
   $resultado=$this->conexion ->query ($consulta);
     return $resultado;

 }
  //para el inicio de sesion 
 function buscar($e_mail, $contraseña){
    $consulta="SELECT * FROM usuario WHERE e_mail='{$e_mail}' AND contraseña='{$contraseña}' AND estatus=1";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

   function actualizar($nombre,$apellidos,$e_mail,$contraseña){
    $consulta="UPDATE usuario SET nombre='{$nombre}', apellidos='{$apellidos}', e_mail='{$e_mail}', contraseña='{$contraseña}', tipo=2 WHERE idusuario='{$idusuario}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
 
  function mostrar(){
    $consulta="SELECT * FROM usuario WHERE estatus=1";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function baja($idusuario){
    $consulta="UPDATE usuario SET estatus=0 WHERE idusuario='{$idusuario}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function cambiar_admin($idusuario){
    $consulta="UPDATE usuario SET tipo=2 WHERE idusuario='{$idusuario}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function cambiar_plebeyo($idusuario){
    $consulta="UPDATE usuario SET tipo=1 WHERE idusuario='{$idusuario}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function mostrar_baja(){
    $consulta="SELECT * FROM usuario WHERE estatus=0";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }

  function cambiar_activo($idusuario){
    $consulta="UPDATE usuario SET estatus=1 WHERE idusuario='{$idusuario}'";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
}

?>