<?php 

require '../config/config.php';
require '../config/conexion.php';
$db= new Database();
$con=$db->conectar();

$json=file_get_contents('php://input');
$datos=json_decode($json, true);

echo '<pre>',
print_r($datos);
echo '</pre>';

if(is_array($datos)){

	$id_transaccion=$datos['detalles']['id'];
	$total=$datos['detalles']['purchase_units'][0]['amount']['value'];
	$status=$datos['detalles']['status'];
	$fecha=$datos['detalles']['update_time'];
	$fecha_nueva=date('Y-m-d H:i:s', strtotime($fecha));
	$email=$datos['detalles']['payer']['email_address'];
	$id_cliente=$datos['detalles']['payer']['payer_id'];

	$sql=$con->prepare("INSERT INTO compra (id_transaccion, fecha, status, email, idcliente, total) VALUES (?,?,?,?,?,?)");
	$sql->execute([$id_transaccion, $fecha_nueva, $estatus, $email, $id_cliente, $total]);
	$id=$con->lastInsertId();

}