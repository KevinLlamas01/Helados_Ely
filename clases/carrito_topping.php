<?php	
 function __construct()
 {
   require_once("Conexion.php");
   $this->conexion = new Conexion();
 }


 function insertar($fk_carrito,$fk_topping){
   $consulta="INSERT INTO carrito_topping(idcarrito_topping,fk_carrito,fk_topping)VALUES(null,'{$fk_carrito}','{$fk_topping}')";
   $resultado=$this->conexion ->query ($consulta);
    return $resultado;

 }
 function mostrar(){

    $consulta="SELECT * FROM carrito c INNER JOIN carrito_topping ct ON c.idcarrito=ct.fk_carrito INNER JOIN topping t ON t.idtopping=ct.fk_topping";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
 
  function actualizar($idcarrito_topping, $fk_carrito, $fk_topping){
    $consulta="UPDATE carrito_topping SET fk_carrito'{$fk_carrito}', fk_topping='{$fk_topping}' WHERE idcarrito_topping='{$idcarrito_topping}' ";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
  }
?>