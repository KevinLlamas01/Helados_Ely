
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REGISTRO</title>
  <link rel="stylesheet" type="text/css" href="css/estilo.css?a=3">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css?a=2">
  <nav class="navbar" style="background-color: #F7DC6F ;">
  <div class="container-fluid">
    <style> @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap'); 
</style>
<style type="text/css">
  .letra{
     font-family: 'Fredoka One', cursive;
        color: black;
        font-size: 20;
  }
</style>

<a href="index.php"><img class="logo" src="img/heladeri.png"></a>
<center>
<div class="col-md-9">
<a class="letra" href="index.php"> Helados eli </a>
</div>
</center>
<a class="letra" href="inicio_sesion.php"><?php  if (isset($_SESSION['idusuario'])){ echo $_SESSION['nombre'];} else {echo "Inicio de sesion";} ?></a>

<a class="letra" href="sobre_nos.php">Sobre nosotros</a>

</nav>
</div>


</head>

<center>
<div class="col-md-4">
<body style="background-color: #A3E4D7;">
  <form method="post" action="funciones/insertar_usuario.php" enctype="multipart/form-data">
<h1>Registrate</h1> <br>

<label>Nombre:</label>
<input class="form-control" required type="text" name="nombre" placeholder="Nombre de usuario">

<label>Apellidos:</label>
<input class="form-control" required type="text" name="apellidos" placeholder="Apellidos"><br>

<label>Email:</label>
<input onchange="try{setCustomValidity(^[^@]+@[^@]+\.[a-zA-Z]{2,}$)} catch(e) {}"  class="form-control" required type="email" name="e_mail">

<label>Contraseña:</label>
 <input pattern="(  ?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}$)" required class="form-control" type="password" name="contraseña"><br>

<!-- <button class="btn btn-info" value="Iniciar_sesion" type="submit" style="background-color: #F3FC64 ;">Registrarse</button> -->
      <input class="btn btn-info" type="submit" name="Ingresar"value=" Registrarse" style="background-color: #F3FC64 ;">
      <label>¿Ya tienes una cuenta?</label>
        <a style="text-decoration: none;" href="inicio_sesion.php">Inicia aqui</a>

</form>
</div>
</center>

</body>
</html>
<br><br><br><br><br><br>

<footer style="background-color: #F7DC6F; margin-bottom: -10%;" >
  <ul>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <h6 class="text-muted lead">CONTACTO:</h6>
        <h6 class="text-muted"> El Rosario, Sinaloa<br>
          Teléfonos: 6692551445.<br>
        </h6>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="pull-right">
          <h6 class="text-muted lead">ENCUENTRANOS EN REDES SOCIALES</h6>
          <div class="redes-footer">
            <a href="https://www.facebook.com/rubeneduardo.perazaesquer"/><img src=img/fb.png style="width:50px; height:50px;"></a>
              <a href="https://www.facebook.com/rubeneduardo.perazaesquer"/><img src=img/ig.png style="width:50px; height:50px;"></a>

          </div>
        </div>
        <div class="row"> <p class="text-muted small text-right">Rubén Eduardo Peraza Esquer<br> Todos los derechos reservados 2022.</p></div>
        
      </div>
    </div>  
  </div>
</ul>
  </footer>
