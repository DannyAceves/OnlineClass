<?php 
session_start();
include('conexion.php');
include('includes/exception_profesor.php');
include('includes/cons_profesor.php');
    if (isset($_GET['clave'])) {
      $_SESSION['clave']=$_GET['clave'];
    }
    $clavee=$_SESSION['clave'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="img/logo/Online-Class-Color-Logo.png">
    <title>Miembros De La Clase</title>
     <style>
        .materialboxed:hover{
      cursor: pointer;
    }
    #materialbox-overlay {
      background-color: black;
    }

    .input-field input[type=radio]:focus + label {
        color: black;
    }

    input[type="radio"]:checked + label:after,
    input[type="radio"].with-gap:checked + label:before,
    input[type="radio"].with-gap:checked + label:after {
        border: 2px solid black;
    }

    input[type="radio"]:checked + label:after,
    input[type="radio"].with-gap:checked + label:after {
        background-color: black;
    }

    .input-field input[type=text]:focus + label {
            color: black;
    }

    .input-field input[type=date]:focus + label {
            color: black;
    }
   
    .input-field input[type=text]:focus {
            border-bottom: 1px solid black;
            box-shadow: 0 1px 0 0 black;
    }

        .input-field input[type=date]:focus {
            border-bottom: 1px solid black;
            box-shadow: 0 1px 0 0 black;
    }

    .input-field input[type=password]:focus + label {
            color: black;
    }
   
    .input-field input[type=password]:focus {
            border-bottom: 1px solid black;
            box-shadow: 0 1px 0 0 black;
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
  border-bottom: 1px dotted black;
}

textarea.materialize-textarea:disabled + label,
textarea.materialize-textarea[readonly="readonly"] + label {
  color: rgba(0, 0, 0, 0.26);
}

textarea.materialize-textarea:focus:not([readonly]) {
  border-bottom: 1px solid black;
  box-shadow: 0 1px 0 0 black;
}

textarea.materialize-textarea:focus:not([readonly]) + label {
  color: #26a69a;
}

textarea.materialize-textarea.valid,
textarea.materialize-textarea:focus.valid {
  border-bottom: 1px solid black;
  box-shadow: 0 1px 0 0 black;
}

textarea.materialize-textarea.valid + label:after,
textarea.materialize-textarea:focus.valid + label:after {
  content: attr(data-success);
  color: black;
  opacity: 1;
}

textarea.materialize-textarea.invalid,
textarea.materialize-textarea:focus.invalid {
  border-bottom: 1px solid black;
  box-shadow: 0 1px 0 0 black;
}

textarea.materialize-textarea.invalid + label:after,
textarea.materialize-textarea:focus.invalid + label:after {
  content: attr(data-error);
  color: black;
  opacity: 1;
}

.chip {
  display: inline-block;
  height: 32px;
  font-size: 13px;
  font-weight: 500;
  color: rgba(0, 0, 0, 0.6);
  line-height: 32px;
  padding: 0 12px;
  border-radius: 16px;
  background-color: white;
  margin-bottom: 5px;
  margin-right: 5px;
}

.chip img {
  float: left;
  margin: 0 8px 0 -12px;
  height: 32px;
  width: 32px;
  border-radius: 50%;
}

.chip .close {
  cursor: pointer;
  float: right;
  font-size: 16px;
  line-height: 32px;
  padding-left: 8px;
}

.chips {
  border: none;
  border-bottom: 1px solid white;
  box-shadow: none;
  margin: 0 0 20px 0;
  min-height: 45px;
  outline: none;
  transition: all .3s;
}

.chips.focus {
  border-bottom: 1px solid white;
  box-shadow: 0 1px 0 0 white;
}

.chips:hover {
  cursor: text;
}

.chips .chip.selected {
  background-color: black;
  color: white;
}

.chips .input {
  background: none;
  border: 0;
  color: white;
  display: inline-block;
  font-size: 1rem;
  height: 3rem;
  line-height: 32px;
  outline: 0;
  margin: 0;
  padding: 0 !important;
  width: 120px !important;
}

.toast{
  background-color: #4CAF50;
}
  </style>
</head>
  <body>
    <!--Scripts-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
      <script>   
      $(document).ready(function(){
        $('.materialboxed').materialbox();
      });
  </script>
  <script>
       $(document).ready(function(){
        $('.modal').modal();
       });
  </script>
    <script>
      $('.fixed-action-btn').openFAB();
      $('.fixed-action-btn').closeFAB();
      $('.fixed-action-btn.toolbar').openToolbar();
      $('.fixed-action-btn.toolbar').closeToolbar();
  </script>
  <script>
      $(document).ready(function(){
    $('.collapsible').collapsible();
  });
  </script>
  <script>
        $(document).ready(function(){
      $('.parallax').parallax();
    });
  </script>

        <nav>
    <div class="nav-wrapper <?php echo $perfil['color'];?> ">
      <a href="#" class="brand-logo center"><img src="img/logo/Online-Class-White-Logo.png" alt="" style="width: 65px;height: 65px;"></a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a class="white-text waves-effect waves-light btn btn-flat" href="inicio_profesor.php"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a class="white-text waves-effect waves-light btn btn-flat" href="perfil_profesor.php"><i class="material-icons left">account_circle</i>Perfil</a></li>
        <li><a class="white-text waves-effect waves-light btn btn-flat" href="clases_profesor.php"><i class="material-icons left">work</i>Clases</a></li>
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="white-text waves-effect waves-light btn btn-flat" href="action_cerrar.php"><i class="material-icons left">input</i>Cerrar Sesion</a></li>
      </ul>
    </div>
  </nav>
<div class="container">
<h2 class="<?php echo $perfil['color']; ?>-text ">Miembros:</h2>
<?php
$clave_miembros=$_SESSION['clave'];
$cons_miembros="SELECT * FROM mis_clases WHERE clave='$clave_miembros' ORDER BY usuario ASC";
$ini_miembros=mysqli_query($con,$cons_miembros);
$i=0;
    while ($miembros=mysqli_fetch_array($ini_miembros)) {
      $usuario_m=$miembros['usuario'];
      $cons_usuarios="SELECT * FROM usuarios WHERE usuario='$usuario_m'";
      $ini_usuarios=mysqli_query($con,$cons_usuarios);
      $u=0;
      while ($usuarios=mysqli_fetch_array($ini_usuarios)) {
        $usuario=$usuarios['usuario'];
        $imagen=$usuarios['imagen'];
        $u++;
?>
<div class="row">
  <div class="col s6 chip <?php echo $perfil['color']; ?>-text " style="height: 150px;width: 150px;">
    <img src="img/usuarios/<?php echo $imagen; ?>" alt="Contact Person" style="height: 150px;width: 150px;">
    <p class="center"><?php echo $usuario; ?></p>
  </div>
  <div class="col s6">
  <br><br><br>
  	<a href="enviar_correo.php?usuario=<?php echo $usuario; ?>" class="btn <?php echo $perfil['color']; ?>" style="margin-left: 50px;">Enviar Correo Electronico.</a>
  </div>
</div>
<br>
<?php
 }
 $i++; 
}
 ?>
</div>

<?php  
  if (isset($_GET['mensaje'])) {
?>
<script>Materialize.toast('Correo enviado exitosamente!', 4000)</script>
<?php
  }
?>

<br>
<br>

  </body>
</html>