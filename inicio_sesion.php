<?php 
include ('header.php');
 ?>
<!DOCTYPE html>
<html>
<body style="background-color: #A3E4D7;">
<center>
<form method="post" action="funciones/validar_usuario.php" enctype="multipart/form-data">
<div class="col-md-4">
<h1>Inicia sesion</h1> <br>

<label>Correo:</label>
<input class="form-control" required type="email" name="e_mail">

<label>Captura tu contraseña:</label>
<input class="form-control" required type="password" name="contraseña"><br>


<button class="btn btn-info" value="Iniciar sesion" type="submit" style="background-color: #F3FC64 ;">Inicia sesion</button>
 <label>¿No tienes una cuenta?</label>
 <a style="text-decoration: none;" href="registro.php">Crea una</a>
</div>
</center>

<br><br><br><br>

<?php 
include ('footer.php');
 ?>
</html>
 </body>

