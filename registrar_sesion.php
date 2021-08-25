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
    <title>Registrarse</title>
  <style>
  	body{
  		background-image: url(img/backgrounds/games.jpg);
  		background-size: 100vw; 
  	}

  	    .input-field input[type=radio]:focus + h6 {
        color: white;
    }

    input[type="radio"]:checked + h6:after,
    input[type="radio"].with-gap:checked + h6:before,
    input[type="radio"].with-gap:checked + h6:after {
        border: 2px solid white;
    }

    input[type="radio"]:checked + h6:after,
    input[type="radio"].with-gap:checked + h6:after {
        background-color: white;
    }

    .input-field input[type=text]:focus + h6 {
            color: white;
    }
   
    .input-field input[type=text]:focus {
            border-bottom: 1px solid white;
            box-shadow: 0 1px 0 0 white;
    }

    .input-field input[type=password]:focus + h6 {
            color: white;
    }
   
    .input-field input[type=password]:focus {
            border-bottom: 1px solid white;
            box-shadow: 0 1px 0 0 white;
    }

    .input-field input[type=email]:focus + h6 {
            color: white;
    }
   
    .input-field input[type=email]:focus {
            border-bottom: 1px solid white;
            box-shadow: 0 1px 0 0 white;
    }


textarea.materialize-textarea {
  background-color: transparent;
  border: none;
  border-bottom: 1px solid #9e9e9e;
  border-radius: 0;
  outline: none;
  height: 3rem;
  width: 100%;
  font-size: 1rem;
  margin: 0 0 20px 0;
  padding: 0;
  box-shadow: none;
  box-sizing: content-box;
  transition: all 0.3s;
}

textarea.materialize-textarea[readonly="readonly"] {
  color: rgba(0, 0, 0, 0.26);
  border-bottom: 1px dotted white;
}

textarea.materialize-textarea:disabled + h6,
textarea.materialize-textarea[readonly="readonly"] + h6 {
  color: rgba(0, 0, 0, 0.26);
}

textarea.materialize-textarea:focus:not([readonly]) {
  border-bottom: 1px solid white;
  box-shadow: 0 1px 0 0 white;
}

textarea.materialize-textarea:focus:not([readonly]) + h6 {
  color: #26a69a;
}

textarea.materialize-textarea.valid,
textarea.materialize-textarea:focus.valid {
  border-bottom: 1px solid white;
  box-shadow: 0 1px 0 0 white;
}

textarea.materialize-textarea.valid + h6:after,
textarea.materialize-textarea:focus.valid + h6:after {
  content: attr(data-success);
  color: white;
  opacity: 1;
}

textarea.materialize-textarea.invalid,
textarea.materialize-textarea:focus.invalid {
  border-bottom: 1px solid white;
  box-shadow: 0 1px 0 0 white;
}

textarea.materialize-textarea.invalid + h6:after,
textarea.materialize-textarea:focus.invalid + h6:after {
  content: attr(data-error);
  color: white;
  opacity: 1;
}

.input-field input[type=radio]:focus + label {
        color: white;
        }

        input[type="radio"]:checked + label:after,
        input[type="radio"].with-gap:checked + label:before,
        input[type="radio"].with-gap:checked + label:after {
            border: 2px solid white;
        }

        input[type="radio"]:checked + label:after,
        input[type="radio"].with-gap:checked + label:after {
            background-color: white;
        }
        .toast{
          background-color: #F44336;
        }
  </style>
</head>
  <body>
    <!--Scripts-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <!--Scripts-->
      <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large transparent z-depth-0">
      <i class="material-icons"></i>
    </a>
    <ul>
      <li><a class="btn-floating red transparent z-depth-0"><i class="material-icons"></i></a></li>
    </ul>
  </div>
  
<div class="container center">
  <h2 class="light white-text">Iniciar Sesion</h2>
</div>
<div class="container">
  <form action="action_registro.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col s6">
        <div class="input-field">
          <h6 class="white-text">Usuario:</h6><input type="text" name="usuario" class="white-text" autocomplete="off" required="required">
        </div>
        <div class="input-field">
          <h6 class="white-text">Nombre(s):</h6><input type="text" name="nombre" class="white-text" autocomplete="off" required="required">
        </div>
        <div class="input-field">
          <h6 class="white-text">Apellido(s):</h6><input type="text" name="apellidos" class="white-text" autocomplete="off" required="required">
        </div>
        <div class="input-field">
          <h6 class="white-text">Correo:</h6><input type="email" name="correo" class="white-text" autocomplete="off" required="required">
        </div>
        <div class="input-field">
          <h6 class="white-text">Contraseña:</h6><input type="password" name="contrasena" class="white-text" autocomplete="off" required="required">
        </div>
          <p>
            <input type="radio" name="tipo" value="Alumno" id="test1"/>
            <label for="test1" class="white-text">Alumno</label>
          </p>
          <p>
            <input type="radio" name="tipo" value="Profesor" id="test2"/>
            <label for="test2" class="white-text">Profesor</label>
          </p>
          <br>
        <div class="file-field input-field white-text">
        <h6 class="white-text">Imagen De Perfil:</h6>
          <div class="btn btn-flat white-text waves-effect waves-light white-text">
            <span><i class="material-icons">search</i></span>
            <input type="file" name="imagen" required="required" class="white-text">
          </div>
          <div class="file-path-wrapper" class="white-text">
            <input class="file-path" class="white-text" type="text">
          </div>
        </div>
              <div class="center">
        <input type="submit" name="reg" value="Aceptar" class="btn btn-flat waves-effect waves-light white-text">
      </div>
      </div>
      <div class="col s6 center">
        <img src="img/logo/Online-Class-White-Logo.png" alt="" style="width: 200px;height: 200px;"><br>
        <a href="index.php" style="margin-left: 5px;margin-top: 5px;" class="white-text btn btn-flat waves-effect waves-light"><i class="material-icons left" style="color: white;">home</i>Inicio</a><br>
        <a href="iniciar_sesion.php" style="margin-left: 5px;margin-top: 5px;" class="white-text btn btn-flat waves-effect waves-light"><i class="material-icons left" style="color: white;">input</i>Iniciar Sesion</a><br>
        <a href="#" style="margin-left: 5px;margin-top: 5px;" class="white-text btn btn-flat waves-effect waves-light"><i class="material-icons left" style="color: white;">verified_user</i>Conocemos</a><br>
        <a href="#" style="margin-left: 5px;margin-top: 5px;" class="white-text btn btn-flat waves-effect waves-light"><i class="material-icons left" style="color: white;">chat_bubble</i>Contactanos</a>
    </div>
      </div>
    </div>
  </form>      
</div>

<?php 
if (isset($_GET['usuario'])) {
?>
  <script>Materialize.toast('El Usuario Que Ingresaste Ya Esta Uso.', 4000)</script>
<?php  
  }elseif (isset($_GET['correo'])) {
?>
  <script>Materialize.toast('El Correo Que Ingresaste Ya Esta En Uso.', 4000)</script>
<?php
  }elseif (isset($_GET['correoyusuario'])) {
?>
  <script>Materialize.toast('El Usuario & Correo Que Ingresaste Ya Estan En Uso.', 4000)</script>
<?php
}
?>

<br><br>

  </body>
</html>
