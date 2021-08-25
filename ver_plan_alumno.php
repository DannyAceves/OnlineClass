<?php  
session_start();
include('includes/exception_alumno.php');
include('includes/cons_alumno.php');
include('conexion.php');

if (isset($_GET['clave'])) {
  $_SESSION['clave']=$_GET['clave'];
}

$clavee=$_GET['clave'];

    if (isset($_GET['salir'])) {
        $salir=$_GET['salir'];
        $iniciar_salir="DELETE FROM mis_clases WHERE id_mis_clases='$salir'";
        $inicio=mysqli_query($con,$iniciar_salir);
        if ($inicio) {
          header('Location: clases_alumno.php');
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
    <title>Detalles Clase</title>
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

  <?php 
  if (isset($_GET['clave'])) {
    $_SESSION['clave']=$_GET['clave'];
  }
  $claveee=$_SESSION['clave'];
  $cons_desing="SELECT * FROM clases WHERE clave='$claveee'";
  $iniciar_cons_desing=mysqli_query($con,$cons_desing);
  $i=0;
    while ($array_d=mysqli_fetch_array($iniciar_cons_desing)) {
      $cla_cla=$array_d['clave'];
      $nom_cla=$array_d['nombre_clase'];
      $usu_cla=$array_d['usuario'];
      $des_cla=$array_d['descripcion'];
      $img_cla=$array_d['imagen'];
      $i++;
?>
    <div class="parallax-container">
      <div class="parallax"><img src="img/clases/<?php echo $array_d['imagen'];?>" class="responsive-img"></div>
    </div>
    <div class="container">
        <h1 class="center <?php echo $perfil['color'];?>-text"><?php echo $nom_cla;?></h1>
        <h4 class="black-text">Prof(a). <?php echo $usu_cla;?></h4>
        <h4 class="<?php echo $perfil['color'];?>-text"><?php echo "$des_cla"; ?></h4>
    </div>
<?php } ?>
<br>
<div class="container">
<?php  
$clave_m=$_SESSION['clave'];
$cons_miem="SELECT * FROM mis_clases WHERE clave='$clave_m'";
$query_miem=mysqli_query($con,$cons_miem);
$miembros=mysqli_num_rows($query_miem);
if ($miembros>0) {
  $in="<h2 class='center ";
  $med=$perfil['color'];
  $fin="-text '>Miembros:</h2>";
  echo $in,$med,$fin;
?>
<?php  
$cons_count_miembros="SELECT * FROM mis_clases WHERE clave='$clavee'";
$query_count_miembros=mysqli_query($con,$cons_count_miembros);
$rows_miembros=mysqli_num_rows($query_count_miembros);
?>
<div class="container">
    <div class="right-align"><h6 class="<?php echo $perfil['color']?>-text">Hay: <?php echo $rows_miembros;?> <?php if ($rows_miembros==1){ echo "Miembro Inscrito A Esta Clase"; } else{ echo "Miembros En Esta Clase"; } ?></h6></div>
  </div>
<?php }

$usuario_miembro=$perfil['usuario'];
$clave_miembros=$_SESSION['clave'];
$cons_miembro_tu="SELECT * FROM mis_clases WHERE clave='$clave_miembros' AND usuario='$usuario_miembro'";
$ini_miembros_tu=mysqli_query($con,$cons_miembro_tu);

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
  <div class="chip <?php echo $perfil['color']; ?>-text " style="height: 150px;width: 150px;">
    <img src="img/usuarios/<?php echo $imagen; ?>" alt="Contact Person" style="height: 150px;width: 150px;">
    <p class="center"><?php echo $usuario; ?></p>
  </div>
<?php
 }
 $i++; 
}
 ?>
</div>
<br>
<?php  
  $temar_cla=$_SESSION['clave'];
  $temar_cons="SELECT * FROM archivos WHERE clave='$temar_cla'";
  $temar_ini=mysqli_query($con,$temar_cons);
  $temar_rows=mysqli_num_rows($temar_ini);
  if ($temar_rows==1) {
      $clave_temario=$_SESSION['clave'];
      $cons_temario="SELECT * FROM archivos WHERE clave='$clave_temario'";
      $iniciar_temario=mysqli_query($con,$cons_temario);
      $i=0;
        while ($array_t=mysqli_fetch_array($iniciar_temario)) {
        $nombre_arhivo=$array_t['archivo'];
        $nombre_nombre_arhivo=$array_t['nombre'];
        $i++;
?>
<div class="container">
<h2 class="center <?php echo $perfil['color'];?>-text">Temario:</h2>
  <table class="highlight centered">
        <tbody>
          <tr>
            <td><h5><?php echo $nombre_nombre_arhivo; ?></h5></td>
            <td><a href="img/clases/temarios-archivos/<?php echo $array_t['archivo']?>" target="_blank" class="btn <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons right">visibility</i>Ver</a></td>
            <td><a href="img/clases/temarios-archivos/<?php echo $array_t['archivo']?>" download="Temario <?php echo $clave_temario; ?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons right">file_download</i>Descargar</a></td>
          </tr>
        </tbody>
      </table>
</div>
<?php }}else{  ?>
<?php } ?>
<br>

<?php  
$clave_archivos=$_SESSION['clave'];
$cons_archivos="SELECT * FROM archivos_adicionales WHERE clave='$clave_archivos'";
$archivos_ini=mysqli_query($con,$cons_archivos);
$archivos_rows=mysqli_num_rows($archivos_ini);
  if ($archivos_rows>0) {
?>
<?php  
$cons_count_archivosa="SELECT * FROM archivos_adicionales WHERE clave='$clavee'";
$query_count_archivosa=mysqli_query($con,$cons_count_archivosa);
$rows_archivosa=mysqli_num_rows($query_count_archivosa);
?>
<div class="container">
<h2 class="<?php echo $perfil['color'];?>-text center">Materiales Adicionales:</h2>
<div class="contar">
  <h6 class="right-align <?php echo $perfil['color'];?>-text">No. De Archivos: <?php echo $rows_archivosa;?></h6>
</div>
  <table class="highlight centered">
        <thead class="<?php echo $perfil['color']; ?>">
          <tr>
              <th class="white-text">Nombre</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
<?php
  }else{
?>
<?php } ?>
<?php  
$clave_archivos_archivos=$_SESSION['clave'];
$cons_archivos_archivos="SELECT * FROM archivos_adicionales WHERE clave='$clave_archivos_archivos'";
$iniciar_archivos_archivos=mysqli_query($con,$cons_archivos_archivos);
$i=0;
    while ($array_archivos=mysqli_fetch_array($iniciar_archivos_archivos)) {
    $nombre_nombre_arhivo=$array_archivos['archivo'];
    $nombre_nombre_nombre_arhivo=$array_archivos['nombre'];
    $i++;
?>
<tr>
  <td><h5><?php echo $nombre_nombre_nombre_arhivo; ?></h5></td>
  <td><a href="img/clases/temarios-archivos/<?php echo $array_archivos['archivo']; ?>" download="<?php echo $nombre_nombre_nombre_arhivo; ?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons right">file_download</i>Descargar</a></td>
</tr>  
<?php } ?>
</tbody>
      </table>
</div>
<br>
<?php  
$check_plan="SELECT * FROM plan_clase WHERE clave='$claveee'";
$iniciar_check_plan=mysqli_query($con,$check_plan);
$rows_check=mysqli_num_rows($iniciar_check_plan);
if ($rows_check>0) {
  $inicio="<h2 class='";
  $medio=$perfil['color'];
  $fin="-text '>Actividades De La Clase:</h2>";
  echo "<div class='container center'>";
  echo $inicio,$medio,$fin;
  echo '</div>';
}else{
}
?>


<?php  
$cons_plan="SELECT * FROM plan_clase WHERE clave='$claveee'";
  $iniciar_cons_plan=mysqli_query($con,$cons_plan);
  $i=0;
    while ($array_p=mysqli_fetch_array($iniciar_cons_plan)) {
      $id_act=$array_p['id_plan'];
      $titulo_act=$array_p['titulo'];
      $descripcion_act=$array_p['texto'];
      $fecha_act=$array_p['fecha_entrega'];
      $i++;
?>
<br>
<div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card <?php echo $perfil['color']; ?>">
            <div class="card-content white-text">
              <span class="card-title"><h3><?php echo $titulo_act; ?></h3></span>
              <p><?php echo $descripcion_act; ?></p>
              <br>
                <div class="chip">
                Fecha De Entrega:   
                <?php echo $fecha_act; ?>
                </div>
                <div class="right">
                </div>
            </div>
            <div class="card-action white">
                <?php  
                  $usuarioo=$perfil['usuario'];
                  $clave_e=$_SESSION['clave'];
                  $cons_entrega="SELECT * FROM actividades WHERE id_identificador='$id_act' AND usuario='$usuarioo' AND clave='$clave_e'";
                  $qentrega=mysqli_query($con,$cons_entrega);
                  $rows_e=mysqli_num_rows($qentrega);
                  if ($rows_e==1) {
                    $assoc=mysqli_fetch_assoc($qentrega);
                  ?>
                  <div class="chip green-text">
                    <img src="img/usuarios/<?php echo $perfil['imagen']; ?>" alt="Contact Person">
                    <?php 
                    if($assoc['calificacion']==""){
                      ?>
                      Actividad Entregada.<i class="material-icons left">done</i>
                      <?php
                      }else{
                        ?>
                      Actividad Evaluada.<i class="material-icons left">done_all</i>
                        <?php
                        } ?>
                    <p class="black-text">
                    <?php 
                    if($assoc['calificacion']==""){
                        echo "Aun no tienes calificacion de esta actividad.";
                      }else{
                        echo "Calificacion:".' '.$assoc['calificacion'];
                        } ?>
                        </p>
                  </div>
                  <?php }else{ 
                    ?>
                  <a class="white-text btn waves-effect <?php echo $perfil['color'];?> waves-effect waves-light" href="entregar_actividad_alumno.php?id_i=<?php echo $id_act; ?>">Entregar</a><br><br>
                  <div class="chip red-text">
                    <img src="img/usuarios/<?php echo $perfil['imagen']; ?>" alt="Contact Person">
                    <i class="material-icons left">timer</i>Aun no entregas esta actividad.
                  </div>
                  <?php
                  }
                ?>
                
            </div>
          </div>
        </div>
      </div>
    </div>
<?php } ?>
<br>

<?php  
  $clave_foro=$_SESSION['clave'];
  $cons_foro="SELECT * FROM foro WHERE clave='$clave_foro'";
  $iniciar_foro=mysqli_query($con,$cons_foro);
  $rows_foro=mysqli_num_rows($iniciar_foro);
  if (!$rows_foro>0) {
?>
<?php 
  }
?> 

<?php 
  $consu_foro="SELECT * FROM foro WHERE clave='$clave_foro'";
  $iniciar_consu_foro=mysqli_query($con,$consu_foro);
  $i=0;
    while ($array_f=mysqli_fetch_array($iniciar_consu_foro)) {
        $id_t=$array_f['id_tema'];
        $u_f=$array_f['usuario'];
        $t_f=$array_f['tema'];
        $f_f=$array_f['fecha'];
        $i_f=$array_f['imagen'];
        $i++;
?>

<div class="container">
<h2 class="<?php echo $perfil['color'];?>-text center">Foro De Discusion:</h2>
      <div class="row">
        <div class="col s12 ">
          <div class="card white">
            <div class="card-content">
              <div class="chip" style="height: 150px;width: 150px;">
                <img src="img/usuarios/<?php echo $i_f;?>" alt="Contact Person" style="height: 150px;width: 150px;">
              </div>
              <h6 class="<?php echo $perfil['color'];?>-text "><?php echo $u_f; ?></h6>
              <br>
              <h3><?php echo $t_f; ?></h3>
            </div>
            <div class="card-action">
              <div class="container">
                <h6 class="right-align grey-text"><?php echo $f_f; ?></h6>
              </div>
                <br>
                <div class="right-align">
                  <a href="tema_alumno.php?id_tema=<?php echo $id_t;?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light">Ver Publicacion Completa.</a>
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

  </body>
</html>