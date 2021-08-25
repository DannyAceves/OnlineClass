<?php
session_start();
include('conexion.php');
include('includes/exception_sesion_iniciada.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="icon" href="img/logo/Online-Class-Color-Logo.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
  .toast{
    background-color: 
    <?php
      if (isset($_GET['no_inicio'])) {
        echo "#F44336";
      }elseif (isset($_GET['registro'])){
        echo "#009688";
      }
    ?>;
  }
  </style>
    <title>Iniciar Sesion</title>
</head>
  <body>
    <!--Scripts-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
      <script>
      $(document).ready(function(){
        $('.parallax').parallax();
      });
  </script>
    <!--Scripts-->
      <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large transparent z-depth-0">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red transparent z-depth-0"><i class="material-icons">insert_chart</i></a></li>
    </ul>
  </div>
  
    <div class="parallax-container">
    <div class="parallax"><img src="img/backgrounds/pc-white.jpg" class="responsive-img"></div>
    <a href="index.php" style="margin-left: 5px;margin-top: 5px;" class="teal-text btn btn-flat waves-effect waves-light"><i class="material-icons left" style="color: #009688;">home</i>Inicio</a>
    <a href="#" style="margin-left: 5px;margin-top: 5px;" class="teal-text btn btn-flat waves-effect waves-light"><i class="material-icons left" style="color: #009688;">verified_user</i>Conocemos</a>
    <a href="#" style="margin-left: 5px;margin-top: 5px;" class="teal-text btn btn-flat waves-effect waves-light"><i class="material-icons left" style="color: #009688;">chat_bubble</i>Contactanos</a>
    </div>
  <div class="container center">
  <h2 class="light teal-text">Iniciar Sesion</h2>
  </div>

<div class="container">
<form action="action_iniciar.php" method="POST" onsubmit="return validar_inicio();">
  <div class="row">
    <div class="col s6">
      <div class="input-field">
        <h6 class="black-text">Correo:</h6><input type="email" class="teal-text" name="correo" id="correo" id="correo" autocomplete="off" required="required">
      </div>
      <div class="input-field">
        <h6 class="black-text">Contraseña:</h6><input type="password" class="teal-text" name="contrasena" id="contrasena" autocomplete="off" id="contrasena" required="required">
      </div>
    </div>
    <div class="col s6 center">
      <img src="img/logo/Online-Class-Color-Logo.png" alt="" style="width: 200px;height: 200px;">
    </div>
  </div>
  <div class="center">
    <input type="submit" name="ini" value="Iniciar Sesion" class="btn waves-effect waves-light ">
  </div>
  <div class="container center">
      <p class="black-text center">¿Aun no estas registrado? Registrate:</p>
      <a class="btn waves-effect waves-light " href="registrar_sesion.php">Registrarse</a>
  </div>
</form>
</div>
<?php  
if (isset($_GET['no_inicio'])) {
?>
  <script>Materialize.toast('Verifique Sus Datos Nuevamente.', 4000)</script>
<?php
}elseif(isset($_GET['registro'])){
?>
  <script>Materialize.toast('Has Sido Registrado Exitosamente, Inicia Sesion Ya!.', 4000)</script>
<?php  
}
?>

<br><br>
    

  </body>
</html>