<?php 

class producto
{
	
	function __construct()
	{
		require_once("Conexion.php");
		$this->conexion = new Conexion();
	}
	function insertar($nom,$costo,$precio,$desc,$stock,$foto, $fk_categoria){
		$consulta="INSERT INTO producto(idproducto, nombre,costo, precio, descripcion, stock,
		 foto, estatus, fk_categoria_producto) VALUES 
		(null, '{$nom}','{$costo}', '{$precio}', '{$desc}', '{$stock}', '{$foto}', 1, '{$fk_categoria}')";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}
	function mostrar(){
		$consulta="SELECT * FROM  producto";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}

	function baja($idproducto){
		$consulta="UPDATE producto SET estatus=0 WHERE idproducto='{$idproducto}'";
		$resultado=$this->conexion->query($consulta);
		return $resultado;  
	  }
	  function actualizar($idproducto,$nombre,$precio,$desc,$stock,$foto){
		$consulta="UPDATE producto SET nombre='{$nombre}', precio='{$precio}', descripcion='{$desc}', stock='{$stock}', foto='{$foto}' WHERE idproducto='{$idproducto}'";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	  }
	
	  function alta($idproducto){
		$consulta="UPDATE producto SET estatus=1 WHERE idproducto='{$idproducto}'";
		$resultado=$this->conexion->query($consulta);
		return $resultado;  
	  }

	  function mostrarPorId($idproducto){
		$consulta="SELECT * FROM producto WHERE idproducto='{$idproducto}' ";
		$respuesta=$this->conexion->query($consulta);
		return $respuesta;
	 }
	 function mostrarPopular($pk_categoria){

		$consulta=" SELECT * FROM producto p INNER JOIN detalle_venta dv ON p.idproducto=dv.fk_producto WHERE fk_categoria_producto='{$pk_categoria}' GROUP BY nombre ORDER BY SUM(cantidad)DESC LIMIT 1 ";
		$resultado=$this->conexion->query($consulta);
		return $resultado;  
	  }
	  function mostrarProductCat($categoria){

		$consulta="SELECT * FROM  producto p INNER JOIN  categoria_producto cp ON  p.fk_categoria_producto='{$categoria}'";
		$resultado=$this->conexion->query($consulta);
		return $resultado;  
	  }
}
?>