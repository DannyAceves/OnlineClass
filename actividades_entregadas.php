<?php  
session_start();
include('conexion.php');
include('includes/exception_profesor.php');
include('includes/cons_profesor.php');
  
    if (isset($_GET['id'])) {
      $_SESSION['id']=$_GET['id'];
    }

    $id_pag=$_SESSION['id'];

    if (isset($_POST['cali'])) {
      $calif=$_POST['califi'];
      $calif_clave=$_SESSION['clave'];
      $calif_usu=$_POST['user'];
      $calif_id=$_SESSION['id'];
      $ins_c="UPDATE actividades SET calificacion='$calif' WHERE usuario='$calif_usu' AND id_identificador='$calif_id' AND clave='$calif_clave'";
      $query_calificar=mysqli_query($con,$ins_c);
      if ($query_calificar) {
        header("Location: actividades_entregadas.php?id=$id_pag");
      }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/materialize.css">
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
    <title>Actividades Entregadas</title>

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
  <script>
      $(document).ready(function() {
    $('select').material_select();
  });
  </script>
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
<h2 class="<?php echo $perfil['color'];?>-text ">Actividades Entregadas:</h2>
<br>
  <table class="highlight centered">
    <thead class="<?php echo $perfil['color'];?> white-text">
    <tr>
      <th data-field="nombre">Nombre Del Alumno</th>
      <th data-field="texto">Texto</th>
      <th data-field="archivo">Archivo</th>
      <th data-field="calificacion">Calificacion</th>
    </tr>
      </thead>
  <tbody>
<?php
  $clavee=$_SESSION['clave'];
  $idd=$_SESSION['id'];
  $conss="SELECT * FROM actividades WHERE id_identificador='$idd' AND clave='$clavee'";
  $iniciarr=mysqli_query($con,$conss);
  $rows=mysqli_num_rows($iniciarr);
  if ($rows>0) {  
    }else{
  ?>
  </tbody>
  </table>
  <br>
  <h6 class=' <?php echo $perfil['color'];?>-text'>Nadie ha entregado esta actividad.</h6>
  <?php
    }
  ?>

      <?php 
      $clave=$_SESSION['clave'];
      $id=$_SESSION['id'];
      $cons="SELECT * FROM actividades WHERE id_identificador='$id' AND clave='$clave'";
      $iniciar=mysqli_query($con,$cons);
      $i=0;
        while ($array=mysqli_fetch_array($iniciar)) {
          $u=$array['usuario'];
          $t=$array['texto'];
          $a=$array['archivo'];
          $c=$array['calificacion'];
          $i++;
      ?>
          <tr>
            <td><?php echo $u; ?></td>
            <td><?php echo $t; ?></td>
            <td><a href="img/usuarios/archivos/<?php echo $a;?>" download="<?php echo $a;?>" class="btn <?php echo $perfil['color'];?>"><i class="material-icons right">file_download</i>Descargar</a></td>
            <td>
              <?php 
                if ($c=$array['calificacion']=="") {
              ?>

              <form action="actividades_entregadas.php" method="POST">
              <div class="rows">
                    <div class="input-field col s12">
                      <select name="califi" required="required">
                        <option value="" disabled selected>Calificacion</option>
                        <option value="5" required="required">5</option>
                        <option value="6" required="required">6</option>
                        <option value="7" required="required">7</option>
                        <option value="8" required="required">8</option>
                        <option value="9" required="required">9</option>
                        <option value="10" required="required">10</option>
                      </select>
                    </div>
                    <input type="text" hidden value="<?php echo $u;?>" name="user">
                    <input type="submit" class="btn <?php echo $perfil['color'];?> " value="Calificar" name="cali">
              </div>
              </form>

              <?php
                }else{
                  echo $c=$array['calificacion'];
                }
              ?>
            </td>
          </tr>
      <?php } ?>
      </tbody>
      </table>
    </div>
      <br>
    <br>
    <br>
    <br>
    <br>


    

  </body>
</html>