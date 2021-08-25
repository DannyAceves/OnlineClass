<?php 
session_start();
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
    <link rel="stylesheet" href="css/materialize.min.css">
    <title>Inicio</title>
</head>
  <body>
  <!--Scripts-->
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script>
        $(document).ready(function(){
      $('.slider').slider({
        indicators: false
      });
    });
  </script>
  <!--Scripts-->
    <div class="slider fullscreen">
    <ul class="slides">
      <li>
        <img src="img/backgrounds/slider.jpg">
        <div class="caption center-align">
          <img src="img/logo/Online-Class-White-Logo.png" alt="" style="width: 300px;height: 300px;">
          <h3>Aprende...</h3>
          <h5 class="light grey-text text-lighten-3">Aprende cada uno de los temas mas nuevos & relevantes en tecnologia.</h5>
          <br><br>
          <a href="iniciar_sesion.php" class="btn btn-flat waves-effect white-text">Iniciar Sesion</a>
          <p class="white-text">¿Aun no estas registrado? Registrate:</p>
          <a href="registrar_sesion.php" class="btn btn-flat waves-effect white-text">Registrarse</a>
        </div>
      </li>
      <li>
        <img src="img/backgrounds/slider.jpg">
        <div class="caption center-align">
          <img src="img/logo/Online-Class-White-Logo.png" alt="" style="width: 300px;height: 300px;">
          <h3 class="white-text">Enseña...</h3>
          <h5 class="light grey-text text-lighten-3">Enseña a millones de alumnos de una manera sencilla & profesional.</h5>
          <br><br>
          <a href="iniciar_sesion.php" class="btn btn-flat waves-effect white-text">Iniciar Sesion</a>
          <p>¿Aun no estas registrado? Registrate:</p>
          <a href="registrar_sesion.php" class="btn btn-flat waves-effect white-text">Registrarse</a>
        </div>
      </li>
      <li>
        <img src="img/backgrounds/slider.jpg">
        <div class="caption center-align">
        <img src="img/logo/Online-Class-White-Logo.png" alt="" style="width: 300px;height: 300px;">
          <h3 class="white-text">Superate...</h3>
          <h5 class="light grey-text text-lighten-3">Supera tus metas, tus logros. Supera tus conocimientos.</h5>
          <br><br>
          <a href="iniciar_sesion.php" class="btn btn-flat waves-effect white-text">Iniciar Sesion</a>
          <p>¿Aun no estas registrado? Registrate:</p>
          <a href="registrar_sesion.php" class="btn btn-flat waves-effect white-text">Registrarse</a>
        </div>
      </li>
      <li>
        <img src="img/backgrounds/slider.jpg">
        <div class="caption center-align">
          <img src="img/logo/Online-Class-White-Logo.png" alt="" style="width: 300px;height: 300px;">
          <h3 class="white-text">Divierte...</h3>
          <h5 class="light grey-text text-lighten-3">Bienvenido(a).</h5>
          <br><br>
          <a href="iniciar_sesion.php" class="btn btn-flat waves-effect white-text">Iniciar Sesion</a>
          <p>¿Aun no estas registrado? Registrate:</p>
          <a href="registrar_sesion.php" class="btn btn-flat waves-effect white-text">Registrarse</a>
        </div>
      </li>
    </ul>
  </div>     

</body>  
</html>








