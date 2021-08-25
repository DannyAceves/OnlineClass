<?php  
session_start();
include('conexion.php');
include('includes/exception_profesor.php');
include('includes/cons_profesor.php');

    if (isset($_GET['eliminar'])) {
      include('conexion.php');
        $eliminar=$_GET['eliminar'];
        $conseliminar="DELETE FROM clases WHERE id_clase='$eliminar'";
        $inie=mysqli_query($con,$conseliminar);
        if ($inie) {
          header('Location: clases_profesor.php?eliminar_clase=1');
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
   
    .input-field input[type=text]:focus {
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

.toast{
  background-color: #4CAF50;
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

  <div class="fixed-action-btn horizontal click-to-toggle">
      <a class="btn-floating btn-large center <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons">add</i></a>
    <ul>
      <a class="btn-floating waves-effect waves-light center <?php echo $perfil['color'];?> " href="#crear_clase"><i class="material-icons">note_add</i></a>
    </ul>
  </div>
    
    <div id="crear_clase" class="modal">
    <div class="container">
      <div class="row">
        <div class="col s12">
        <br><br>
        <div class="divider"></div>
        <br>
          <h2 class="center <?php echo $perfil['color'];?>-text">Crear Clase:</h2>
          <div class="divider"></div>
          <div class="container">
           <p class="center">¿Quieres Enseñar Algo Nuevo?</p>
           <p class="center">Aqui podras crear tus clases del tema que tu quieras.</p>
         </div>
          <form action="action_crear_clase_profesor.php" method="POST" enctype="multipart/form-data">
            <div class="input-field col s6">
              <h6 class="<?php echo $perfil['color'];?>-text">Nombre:</h6>
              <input type="text" id="nombre" name="nombre" required="required" autocomplete="off">
            </div>
            <div class="input-field col s6">
              <h6 class="<?php echo $perfil['color'];?>-text">Clave:</h6>
              <input type="text" id="clave" name="clave" maxlength="8" required="required" autocomplete="off">
            </div>
            <div class="input-field col s12">
            <h6 class="<?php echo $perfil['color'];?>-text">Descripcion:</h6>
            <textarea id="descripcion" name="descripcion" class="materialize-textarea" required="required"></textarea>
            </div>
            <div class="file-field input-field col s12">
            <h6 class="<?php echo $perfil['color'];?>-text">Imagen:</h6>
              <div class="btn <?php echo $perfil['color'];?> waves-effect waves-light">
                <span><i class="material-icons">search</i></span>
                <input type="file" name="imagen" required="required">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path" type="text" required="required">
              </div>
            </div>
            <div class="container center">
            <input type="submit" class="btn <?php echo $perfil['color'];?> waves-effect waves-light" value="Crear" name="crear">
            </div>
            <br><br>
          </form>
        </div>
      </div>
    </div>
  </div>

  

  <div class="container">
  <h2 class="<?php echo $perfil['color'];?>-text ">Clases:</h2>
  <br>
      <?php
      $p=$perfil['usuario'];
      $inicio="<thead class='white-text ";
      $fin="'>";
      $color=$perfil['color'];
      $cs="SELECT * FROM clases WHERE usuario='$p'";
      $qeury=mysqli_query($con,$cs);
      $rows=mysqli_num_rows($qeury);
      if ($rows>0) {
        echo "<table class='centered highlight'>";
        echo $inicio,$color,$fin;
        echo "<tr>";
        echo "<th data-field='clave'>Clave</th>";
        echo "<th data-field='nombre'>Nombre</th>";
        echo "<th data-field='usuario'>Usuario</th>";
        echo "<th data-field='descripcion'>Descripcion</th>";
        echo "<th data-field='imagen'>Imagen</th>";
        echo "<th data-field='fecha_creacion'>Fecha de Creacion</th>";
        echo "<th data-field='ver_plan'></th>";
        echo "<th data-field='eliminar'></th>";
        echo "</tr>";
        echo "<thead>";
       }else{
          $in="<h6 class='";
          $clr=$perfil['color'];
          $fn="-text '>Aun no has creado alguna clase.</h6>";
          echo $in,$clr,$fn;
       } 
      ?>

      <?php 
      $profesor=$perfil['usuario'];
      $cons="SELECT * FROM clases WHERE usuario='$profesor'";
      $iniciar=mysqli_query($con,$cons);
      $i=0;
        while ($array=mysqli_fetch_array($iniciar)) {
          $id=$array['id_clase'];
          $c=$array['clave'];
          $n=$array['nombre_clase'];
          $u=$array['usuario'];
          $d=$array['descripcion'];
          $i=$array['imagen'];
          $f=$array['fecha'];
          $i++;
      ?>
        <tbody>
          <tr>
              <td><?php echo $c; ?></td>
              <td><?php echo $n; ?></td>
              <td><?php echo $u; ?></td>
              <td><?php echo $d; ?></td>
              <td><img src="<?php echo 'img/clases/'.$array['imagen']; ?>" width="300px" height="200px" alt=""></td>
              <td><?php echo $f; ?></td>
              <td><a class="btn <?php echo $perfil['color'];?> waves-effect waves-light" href="ver_plan_profesor.php?clave=<?php echo $c; ?>">Ver</a></td>
              <td><a class="btn <?php echo $perfil['color'];?> waves-effect waves-light" href="clases_profesor.php?eliminar=<?php echo $id;?>">Eliminar</a></td>
          </tr>
        </tbody>

      <?php } ?>
  </table>
  </div>

  <?php  
  if (isset($_GET['creada'])) {
  ?>
    <script>Materialize.toast('Clase Creada Exitosamente.', 4000)</script>
  <?php
  }elseif (isset($_GET['eliminar_clase'])) {
  ?>
    <script>Materialize.toast('Clase Eliminada Exitosamente', 4000)</script>
  <?php
  }
  ?>
  <br>
  <br>
  <br>
  <br>

    

  </body>
</html>






