<?php  
session_start();
include('conexion.php');
include('includes/exception_profesor.php');
include('includes/cons_profesor.php');
  
    if (isset($_GET['id_tema'])) {
      $_SESSION['id_tema']=$_GET['id_tema'];
    }
    $clavee=$_SESSION['clave'];
    $id_temaa=$_SESSION['id_tema'];

    if (isset($_POST['comen'])) {
      $comen_id=$_SESSION['id_tema'];
      $comen_clave=$_SESSION['clave'];
      $comen=$_POST['comentario'];
      $comen_usuario=$perfil['usuario'];
      $comen_imagen=$perfil['imagen'];
      $comen_ins="INSERT INTO comentario(id_tema,clave,comentario,usuario,imagen) VALUES ('$comen_id','$comen_clave','$comen','$comen_usuario','$comen_imagen')";
      $comen_query=mysqli_query($con,$comen_ins);
      if ($comen_query) {
        header("Location: tema_profesor.php?id_tema=$id_temaa");
      }
    }

     if (isset($_GET['id_comentario'])) {
        $eliminar=$_GET['id_comentario'];
        $conseliminar="DELETE FROM comentario WHERE id_comentario='$eliminar'";
        $inie=mysqli_query($con,$conseliminar);
        if ($inie) {
          header("Location: tema_profesor.php?id_tema=$id_temaa");
        }
    }

          if (isset($_GET['id_tema_e'])) {
        $id_tema_e=$_GET['id_tema_e'];
        $conseliminar="DELETE FROM foro WHERE id_tema='$id_tema_e'";
        $inie=mysqli_query($con,$conseliminar);
        if ($inie) {
          header("Location: ver_plan_profesor.php?clave=$clavee");
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
    <title>Publicacion Del Foro</title>

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
      <a class="btn-floating btn-large center <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons">delete</i></a>
    <ul>
      <a class="btn-floating waves-effect waves-light center <?php echo $perfil['color'];?> waves-effect waves-light" href="#eliminar"><i class="material-icons">delete</i></a>
    </ul>
  </div>
    <div id="eliminar" class="modal">
    <div class="container">
      <br><br>
      <div class="divider"></div>
        <br>
          <h2 class="center <?php echo $perfil['color'];?>-text">Eliminar Publicacion:</h2>
          <div class="divider"></div>
          <br>
          <?php
              $clave_foro=$_SESSION['clave'];
              $usuario_foro=$perfil['usuario'];
              $consu_foro="SELECT * FROM foro WHERE clave='$clave_foro' AND usuario='$usuario_foro' AND id_tema='$id_temaa'";
              $iniciar_consu_foro=mysqli_query($con,$consu_foro);
              $i=0;
                while ($array_f=mysqli_fetch_array($iniciar_consu_foro)) {
                    $id_t=$array_f['id_tema'];
                    $u_f=$array_f['usuario'];
                    $t_f=$array_f['tema'];
                    $f_f=$array_f['fecha'];
                    $i++;
          ?>
          <div class="center-align">
            <a href="tema_profesor.php?id_tema_e=<?php echo $id_t;?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light">Eliminar Publicacion</a>
          </div>
          <?php } ?>
      <br>
    </div>
    <br><br>
  </div>

    <br>
    <div class="container">
    <h2 class="<?php echo $perfil['color'];?>-text center">Publicacion Completa:</h2>
    </div>
<?php  
  $clave_foro=$_SESSION['clave'];
  $usuario_foro=$perfil['usuario'];
  $cons_foro="SELECT * FROM foro WHERE clave='$clave_foro' AND usuario='$usuario_foro'";
  $iniciar_foro=mysqli_query($con,$cons_foro);
  $rows_foro=mysqli_num_rows($iniciar_foro);
  if (!$rows_foro>0) {
?>
    <div class="container">
      <h6 class="<?php echo $perfil['color'];?>-text">No hay temas de esta clase todavia.</h6>
    </div>
<?php 
  }
?> 

<?php 
  $consu_foro="SELECT * FROM foro WHERE clave='$clave_foro' AND usuario='$usuario_foro' AND id_tema='$id_temaa'";
  $iniciar_consu_foro=mysqli_query($con,$consu_foro);
  $i=0;
    while ($array_f=mysqli_fetch_array($iniciar_consu_foro)) {
        $id_t=$array_f['id_tema'];
        $u_f=$array_f['usuario'];
        $t_f=$array_f['tema'];
        $f_f=$array_f['fecha'];
        $i++;
?>

<div class="container">
      <div class="row">
        <div class="col s12 ">
          <div class="card white">
            <div class="card-content">
              <div class="chip" style="height: 150px;width: 150px;">
                <img src="img/usuarios/<?php echo $perfil['imagen'];?>" alt="Contact Person" style="height: 150px;width: 150px;">
              </div>
              <h6 class="<?php echo $perfil['color'];?>-text "><?php echo $u_f; ?></h6>
              <br>
              <h3><?php echo $t_f; ?></h3>
            </div>
            <div class="card-action">
              <div class="container">
                <h6 class="right-align grey-text"><?php echo $f_f; ?></h6>
              </div>
                <div class="row">
                  <form action="tema_profesor.php" method="POST">
                    <div class="input-field col s7">
                      <i class="material-icons prefix"></i>
                      <h6 class="<?php echo $perfil['color'];?>-text">Comentar:</h6>
                      <textarea id="textarea1" class="materialize-textarea" name="comentario" required="required"></textarea>
                    </div>
                    <div class="input field col s5">
                    <br><br><br>
                      <input type="submit" value="Comentar" name="comen" class="btn <?php echo $perfil['color']; ?> waves-effect waves-light">
                    </div>
                  </form>
                </div>
              </div>
                <div class="container">
                <h6 class="grey-text">Comentarios:</h6>
                    <?php  
                      $cons_comentarios="SELECT * FROM comentario WHERE clave='$clave_foro' AND id_tema='$id_temaa'";
                      $iniciar_comentarios=mysqli_query($con,$cons_comentarios);
                      $rows_comentarios=mysqli_num_rows($iniciar_comentarios);
                      if ($rows_comentarios>0) {
                    ?>
                  <table class="centered highlight">
                    <tbody>
                    <?php
                      }else{
                    ?>
                    <h6 class="<?php echo $perfil['color'];?>-text ">No hay ningun comentario.</h6>
                    <?php
                      }
                    ?>
                    <?php  
                      $consul_comen="SELECT * FROM comentario WHERE clave='$clave_foro' AND id_tema='$id_temaa'";
                      $iniciar_consul_comen=mysqli_query($con,$consul_comen);
                      $i=0;
                        while ($array_c=mysqli_fetch_array($iniciar_consul_comen)) {
                          $id_c=$array_c['id_comentario'];
                          $u_c=$array_c['usuario'];
                          $c_c=$array_c['comentario'];
                          $f_c=$array_c['fecha'];
                          $i_c=$array_c['imagen'];
                          $i++;
                        
                    ?>
                      <tr>
                        <td><img src="img/usuarios/<?php echo $i_c;?>" alt="Contact Person" class="circle" style="height: 50px;width: 50px;"></td>
                        <td><?php echo $u_c;?></td>
                        <td><?php echo $c_c; ?></td>
                        <td class="grey-text"><?php echo $f_c; ?></td>
                        <td><a href="tema_profesor.php?id_comentario=<?php echo $id_c; ?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light">Eliminar</a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  <div class="right-align">
                    <?php  
                      $count="SELECT * FROM comentario WHERE clave='$clave_foro' AND id_tema='$id_temaa'";
                      $count_query=mysqli_query($con,$count);
                      $count_rows=mysqli_num_rows($count_query);
                    ?>
                    <h6 class="grey-text">No. De Comentarios: <?php echo $count_rows; ?></h6>
                  </div>
                  <br><br>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php } ?>







    <br>
    <br>
    <br>
    <br>
    <br>
  </body>
</html>