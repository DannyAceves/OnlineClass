<?php  
session_start();
include('includes/exception_profesor.php');
include('includes/cons_profesor.php');
include('conexion.php');
if (isset($_GET['clave'])) {
      $_SESSION['id']=$_GET['clave'];
    }
$clavee=$_SESSION['clave'];
  $usuarioo=$perfil['usuario'];
  $id_clave=$_SESSION['id'];
  $consulta="SELECT * FROM plan_clase WHERE usuario='$usuarioo' AND id_plan='$id_clave'";
  $iniconsul=mysqli_query($con,$consulta);
  $array_ed=mysqli_fetch_assoc($iniconsul);

if (isset($_POST['editar'])) {
  $id=$_SESSION['id'];
  $t=$_POST['titulo'];
  $txt=$_POST['texto'];
  $fe=$_POST['fecha'];
  $editar="UPDATE plan_clase SET titulo='$t', texto='$txt', fecha_entrega='$fe' WHERE id_plan='$id'";
  $iniciar_editar=mysqli_query($con,$editar);
  if ($iniciar_editar) {
    header("Location: ver_plan_profesor.php?clave=$clavee");
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
    <title>Editar Actividad</title>
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


  </style>
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
    <form action="action_editar_plan_clase_profesor.php" method="POST">
    <h2>Editar Actividad</h2>
    <br>
            <div class="input-field col s12">
              <h6 class="<?php echo $perfil['color'];?>-text">Titulo:</h6>
              <input type="text" id="titulo" name="titulo" value="<?php echo $array_ed['titulo'];?>" required="required" autocomplete="off">
            </div>
            <div class="input-field col s12">
            <h6 class="<?php echo $perfil['color'];?>-text">Descripcion:</h6>
            <textarea id="texto" name="texto" class="materialize-textarea" required="required"><?php echo $array_ed['texto'];?></textarea>
            </div>
            <div class="input-field col s12">
            <h6 class="<?php echo $perfil['color'];?>-text">Fecha de Entrega:</h6>
            <input type="date" class="datepicker" name="fecha" value="<?php echo $array_ed['fecha_entrega'];?>" required="required">
            </div>
            <div class="container center">
            <input type="submit" class="btn <?php echo $perfil['color'];?> waves-effect waves-light" value="Editar" name="editar">
            </div>
            <br><br><br>
          </form>
  </div>
    

  </body>
</html>
  





