<?php session_start(); ?>
<script>
        function addProducto(id, token){
            let url = 'clases/carrito.php'
            let formData= new FormData()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data=>{
                if(data.ok){
                    let elemento= document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })

        }
    </script>
<body style="background-color: #A3E4D7;">

<!DOCTYPE html>
<html>
<!--Navegador-->
<head>
  <script type="text/javascript" src="js/bootstrap.js"></script>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css?a=7">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css?a=3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <nav class="navbar" style="background-color: #F7DC6F ;">
  <div class="container-fluid">
<a href="index.php"><img class="logo" src="img/heladeri.png"></a>
<a class="letra" href="index_ad.php">Inicio</a>
<a class="letra" href="formulario_registro_categoria.php">Registrar categorias</a>
<a class="letra" href="formulario_registro_helados.php">Registrar Productos</a>
<a class="letra"  href="funciones/cerrar_sesion.php"><?php  if (isset($_SESSION['idusuario'])){   echo $_SESSION['nombre'];}  ?></a>

<a class="letra" href="formulario_toppings.php">Registrar toppings</a>
</nav>
</head>
</div>

