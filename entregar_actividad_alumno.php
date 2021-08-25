<?php  
session_start();
include('includes/exception_alumno.php');
include('includes/cons_alumno.php');
include('conexion.php');

  if (isset($_GET['id_i'])) {
    $_SESSION['id_i']=$_GET['id_i'];
  }

  if (isset($_POST['entrega'])) {
    $id_i=$_SESSION['id_i'];
    $texto=$_POST['texto'];
    $usuario=$perfil['usuario'];
    $clave=$_SESSION['clave'];
    $archivo=$_FILES['archivo']['name'];
    $cons="SELECT * FROM actividades WHERE id_identificador='$id_i' AND usuario='$usuario' AND clave='$clave'";
    $qcons=mysqli_query($con,$cons);
    $rows_cons=mysqli_num_rows($qcons);
    if ($rows_cons==1) {
      header("Location: ver_plan_alumno.php?clave=$clave");
    }else{
      $ins="INSERT INTO actividades(id_identificador,texto,usuario,clave,archivo) VALUES ('$id_i','$texto','$usuario','$clave','$archivo')";
      $archivo_query=mysqli_query($con,$ins);
        if ($archivo_query) {
          move_uploaded_file($_FILES['archivo']['tmp_name'],'img/usuarios/archivos/'.$archivo);
          header("Location: ver_plan_alumno.php?clave=$clave");
        }
    }
  }
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


.toast {
  border-radius: 2px;
  top: 35px;
  width: auto;
  clear: both;
  margin-top: 10px;
  position: relative;
  max-width: 100%;
  height: auto;
  min-height: 48px;
  line-height: 1.5em;
  word-break: break-all;
  background-color: rgba(0,0,0,0.7);
  padding: 10px 25px;
  font-size: 1.1rem;
  font-weight: 300;
  color: #fff;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
          justify-content: space-between;
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
  </style>
    <title>Entregar Actividad</title>
    <?php    

?>
</head>
  <body>
    <!--Scripts-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <!--Scripts-->

  <nav>
    <div class="nav-wrapper <?php echo $perfil['color'];?> ">
      <a href="#" class="brand-logo center"><img src="img/logo/Online-Class-White-Logo.png" alt="" style="width: 65px;height: 65px;"></a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a class="white-text waves-effect waves-light btn btn-flat" href="inicio_alumno.php"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a class="white-text waves-effect waves-light btn btn-flat" href="perfil_alumno.php"><i class="material-icons left">account_circle</i>Perfil</a></li>
        <li><a class="white-text waves-effect waves-light btn btn-flat" href="clases_alumno.php"><i class="material-icons left">event_note</i>Mis Clases</a></li>
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="white-text waves-effect waves-light btn btn-flat" href="action_cerrar.php"><i class="material-icons left">input</i>Cerrar Sesion</a></li>
      </ul>
    </div>
  </nav>

    <div class="container">
    <form action="entregar_actividad_alumno.php" method="POST" enctype="multipart/form-data">
    <h2>Entregar Actividad:</h2>
    <br>
    <div class="row">
            <div class="input-field col s12">
              <h6 class="<?php echo $perfil['color'];?>-text">Texto:</h6>
              <h6 class="grey-text">Texto adicional donde podras ingresar tus datos o alguna observacion.</h6 class="grey-text">
              <textarea id="texto" name="texto" class="materialize-textarea" required="required"></textarea>
            </div>
            <div class="file-field input-field col s12">
            <h6 class="<?php echo $perfil['color'];?>-text">Archivo:</h6>
      <div class="btn <?php echo $perfil['color']; ?>">
        <span>Buscar</span>
        <input type="file" name="archivo" required="required">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path" type="text" required="required">
      </div>
    </div>
            <div class="container center">
            <input type="submit" class="btn <?php echo $perfil['color'];?> waves-effect waves-light" value="Entregar" name="entrega">
            </div>
            </div>
          </form>
  </div>
    </body>
</html>