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


$idusuario = $_SESSION['idusuario'];


$sql = "SELECT calle, cod, colon, ex FROM peticion_mapa INNER JOIN usuario ON peticion_mapa.fk_usuario = usuario.idusuario WHERE esta = 1 AND idusuario = '$idusuario'";


//$sql = "SELECT calle, cod, colon FROM peticion_mapa WHERE fk_usuario='$idusuario', idpeticion = '$con'";

//$sql = "SELECT MAX(idpeticion), MAX(calle), MAX(cod), MAX(colon) FROM peticion_mapa WHERE fk_usuario='$idusuario'";


//SELECT column_name (s) FROM table1. INNER JOIN table2. ON table1.column_name = table2.column_name;
/*$resultado=$usuario->buscar_id($idusuario);
$resultado2=mysqli_num_rows($resultado);
$datos=mysqli_fetch_assoc($resultado);*/

$ejecutar=mysqli_query($conectar,$sql);
        //$fila = $result->fetch_row();

if($ejecutar){
    while($row = $ejecutar->fetch_array()){
        $calle = $row['calle'];
        $cod = $row['cod'];
        $colon = $row['colon'];
        $des = $row['ex'];
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


}

?>