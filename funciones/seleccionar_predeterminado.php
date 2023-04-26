
<?php
$conectar = mysqli_connect('localhost', 'root', '', 'helados1');
include ('header.php');

 
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


$idusuario = $_SESSION['idusuario'];


   $sql = "SELECT calle_numero, cod_p, colonia, extra FROM domicilio INNER JOIN usuario ON domicilio.fk_usuario = usuario.idusuario WHERE domicilio.Estatus = 1 AND idusuario = $idusuario"; 


//SELECT column_name (s) FROM table1. INNER JOIN table2. ON table1.column_name = table2.column_name;
/*$resultado=$usuario->buscar_id($idusuario);
$resultado2=mysqli_num_rows($resultado);
$datos=mysqli_fetch_assoc($resultado);*/
$ejecutar=mysqli_query($conectar,$sql);
        //$fila = $result->fetch_row();

if($ejecutar){
    while($row = $ejecutar->fetch_array()){
        $calle_numero = $row['calle_numero'];
        $cod_p = $row['cod_p'];
        $colonia = $row['colonia'];
        $descripcion = $row['extra'];
    }

}
        /* la columna cuatro corresponde con la columna del nombre completo */
        //$idusuario = $fila[0];

        /* Podrías guardarlo como variable de sesión */
      

        /* liberar el conjunto de resultados */
        //$resultado->close();//

//UPDATE nombre_tabla SET columna1 = 'nuevo_valor' WHERE columna1 = 'valor1'

//Ejecutar intruccion


//verifica si se ejecuto de forma correcta
if(!$ejecutar){
    echo "Error";
}
else{
    echo "";
}
 

?>

