<?php  
session_start();
include('includes/exception_alumno.php');
include('includes/cons_alumno.php');
include('conexion.php');

    if (isset($_GET['salir'])) {
        $salir=$_GET['salir'];
        $iniciar_salir="DELETE FROM mis_clases WHERE id_mis_clases='$salir'";
        $inicio=mysqli_query($con,$iniciar_salir);
        if ($inicio) {
          header('Location: clases_alumno.php?salir_clase=1');
        }
    }

    if (isset($_POST['unirse'])) {
  $usuario=$perfil['usuario'];
  $clave=$_POST['clave'];
  $correo=$sesion;
  $cons="SELECT * FROM clases WHERE clave='$clave'";
  $ini_cons=mysqli_query($con,$cons);
  $true=mysqli_num_rows($ini_cons);
  if ($true==1) {
    $cons_checar="SELECT * FROM mis_clases WHERE clave='$clave' AND usuario='$usuario'";
    $ini_cons_checar=mysqli_query($con,$cons_checar);
    $rows_ini_cons_checar=mysqli_num_rows($ini_cons_checar);
    if ($rows_ini_cons_checar==1) {
      header('Location: clases_alumno.php?ya_te_uniste=1');
    }else{
      $ins="INSERT INTO mis_clases(usuario,clave,correo_iden) VALUES('$usuario','$clave','$correo')";
      $iniciar=mysqli_query($con,$ins);
      header('Location: clases_alumno.php?exito=1');
    }
    
  }else{
    header('Location: clases_alumno.php?no_existe=1');
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

.toast{
  background-color: 
  <?php  
    if (isset($_GET['exito'])) {
      echo "#4CAF50";
    }elseif (isset($_GET['salir_clase'])) {
      echo "#4CAF50";
    }elseif (isset($_GET['no_existe'])) {
      echo "#F44336";
    }elseif (isset($_GET['ya_te_uniste'])) {
      echo "#F44336";
    }
  ?>;
}

  </style>
    <title>Clases</title>
</head>
  <body>
    <!--Scripts-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
  	<script>
       $(document).ready(function(){
        $('.modal').modal();
       });
  	</script>
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

<div id="unirse_clase" class="modal">
  <div class="container">
  <br><br>
        <div class="divider"></div>
        <br>
  	      <h2 class="<?php echo $perfil['color'];?>-text center">Unirse A Clase:</h2>
  	      <div class="divider"></div>
  	      <br>
          <form action="clases_alumno.php" method="POST">
            <div class="input-field">
              <h6 class="<?php echo $perfil['color'];?>-text">Clave:</h6>
              <input type="text" id="clave" name="clave" maxlength="8" required="required" autocomplete="off">
            </div>
            </div>
            <div class="container center">
            <input type="submit" class="btn <?php echo $perfil['color'];?>" value="Unirse" name="unirse">
            </div>
            <br><br>
          </form>
  </div>
</div>

<?php  
if (isset($_GET['exito'])) {
?>
  <script>Materialize.toast('Te Has Unido Exitosamente.', 4000)</script>
<?php
}elseif (isset($_GET['ya_te_uniste'])) {
?>
  <script>Materialize.toast('Ya Te Uniste Previamente A Esa Clase.', 4000)</script>
<?php
}elseif (isset($_GET['no_existe'])) {
?>
  <script>Materialize.toast('La Clave No Existe, Verifica Tus Datos.', 4000)</script>
<?php
}elseif (isset($_GET['salir_clase'])) {
?>
  <script>Materialize.toast('Has Salido Exitosamente De La Clase.', 4000)</script>
<?php
}
?>

<div class="fixed-action-btn horizontal click-to-toggle">
      <a class="btn-floating btn-large center <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons">add</i></a>
    <ul>
      <a class="btn-floating waves-effect waves-light center <?php echo $perfil['color'];?> " href="#unirse_clase"><i class="material-icons">class</i></a>
    </ul>
  </div>

<div class="container">
<h2 class="<?php echo $perfil['color'];?>-text ">Mis Clases:</h2>
<br>
<?php
      $u=$perfil['usuario'];
      $inicio="<thead class='white-text ";
      $fin="'>";
      $color=$perfil['color'];
      $cs="SELECT * FROM mis_clases WHERE usuario='$u'";
      $iniciar_cs=mysqli_query($con,$cs);
      $rows=mysqli_num_rows($iniciar_cs);
      if ($rows>0) {
        echo "<table class='centered highlight'>";
        echo $inicio,$color,$fin;
        echo "<tr>";
        echo "<th data-field='clave'>Clave</th>";
        echo "<th data-field='nombre'>Nombre</th>";
        echo "<th data-field='usuario'>Profesor</th>";
        echo "<th data-field='descripcion'>Descripcion</th>";
        echo "<th data-field='imagen'>Imagen</th>";
        echo "<th data-field='salir_clase'></th>";
        echo "<th data-field='ver_plan'></th>";
        echo "</tr>";
        echo "<thead>";
       }else{
          $in="<h6 class='";
          $clr=$perfil['color'];
          $fn="-text '>No hay actividades por realizar aun.</h6>";
          echo $in,$clr,$fn;
       } 
      ?>

<?php 
      $alu=$perfil['usuario'];
      $consul="SELECT * FROM mis_clases WHERE usuario='$alu'";
      $iniciar_consul=mysqli_query($con,$consul);
      $i=0;
        while ($array_mis_clases=mysqli_fetch_array($iniciar_consul)) {
          $c=$array_mis_clases['clave'];
          $consul_dos="SELECT * FROM clases WHERE clave='$c'";
          $iniciar_consul_dos=mysqli_query($con,$consul_dos);
          $c=0;
          while ($array_clases=mysqli_fetch_array($iniciar_consul_dos)) {
          	$cl=$array_mis_clases['clave'];
          	$id=$array_mis_clases['id_mis_clases'];
          	$n=$array_clases['nombre_clase'];
          	$p=$array_clases['usuario'];
          	$d=$array_clases['descripcion'];
          	$ic=$array_clases['imagen'];
          	$c++;
          }
          $i++;
      ?>
        <tbody>
          <tr>
              <td><?php echo $cl; ?></td>
              <td><?php echo $n; ?></td>
              <td><?php echo $p; ?></td>
              <td><?php echo $d; ?></td>
              <td><img src="img/clases/<?php echo $ic; ?>" width="300px" height="200px" alt=""></td>
              <td><a class="btn <?php echo $perfil['color'];?> waves-effect waves-light" href="ver_plan_alumno.php?clave=<?php echo $cl;?>"><i class="material-icons right">launch</i>Entrar Entrar</a></td>
              <td><a class="btn <?php echo $perfil['color'];?> waves-effect waves-light" href="clases_alumno.php?salir=<?php echo $id;?>"><i class="material-icons right">exit_to_app</i>Salir De La Clase Clase Clase</a></td>
          </tr>
        </tbody>

      <?php } ?>
  </table>
</div>
    

  </body>
</html>