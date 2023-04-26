<?php
$conectar = mysqli_connect('localhost', 'root', '', 'helados1');

 
//verificacion
if(!$conectar){
    echo"Fallo todo";
}else{
    $base=mysqli_select_db($conectar, 'helados1'); //Nombre de la base de datos
    if(!$base){
        echo "No se encontro la base de datos";
    }


}//Validacion de conexion a la base de datos
//obtener variables

session_start();
$idusuario = $_SESSION['idusuario'];

/*$resultado=$usuario->buscar_id($idusuario);
$resultado2=mysqli_num_rows($resultado);
$datos=mysqli_fetch_assoc($resultado);*/

        //$fila = $result->fetch_row();

        /* la columna cuatro corresponde con la columna del nombre completo */
        //$idusuario = $fila[0];

        /* Podrías guardarlo como variable de sesión */
      

        /* liberar el conjunto de resultados */
        //$resultado->close();//


$calle_numero=$_POST['calle_numero'];
$cod_p=$_POST['cod_p'];
$colonia=$_POST['colonia'];
$descripcion=$_POST['descripcion'];

$sql="UPDATE domicilio SET Estatus = '0' WHERE fk_usuario = '$idusuario'";

//UPDATE nombre_tabla SET columna1 = 'nuevo_valor' WHERE columna1 = 'valor1'

//Ejecutar intruccion
$ejecutar=mysqli_query($conectar,$sql);

//verifica si se ejecuto de forma correcta
if(!$ejecutar){
    echo "Error";
}
else{
$sql1="INSERT INTO domicilio values (NULL,'$calle_numero','$cod_p','$colonia','1','$idusuario','$descripcion')";
$ejecutar1=mysqli_query($conectar,$sql1);

    echo"datos guardados <br>";
header("Status: 301 Moved Permanently");
header("Location: ../direcciones.php");
exit;

}

?>