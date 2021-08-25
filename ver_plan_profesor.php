<?php  
session_start();
include('conexion.php');
include('includes/exception_profesor.php');
include('includes/cons_profesor.php');
  
    if (isset($_GET['clave'])) {
      $_SESSION['clave']=$_GET['clave'];
    }
    $clavee=$_SESSION['clave'];

    if (isset($_POST['agregar'])) {
        $u=$perfil['usuario'];
        $c=$_SESSION['clave'];
        $t=$_POST['titulo'];
        $tex=$_POST['texto'];
        $f=$_POST['fecha'];
        $ins="INSERT INTO plan_clase (usuario,clave,titulo,texto,fecha_entrega) VALUES ('$u','$c','$t','$tex','$f')";
        $iniciar=mysqli_query($con,$ins);
        if ($iniciar) {
          header("Location: ver_plan_profesor.php?clave=$clavee");
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

    if (isset($_POST['temario'])) {
      $archivo_t=$_FILES['archivo']['name'];
      $clave_t=$_SESSION['clave'];
      $usuario_t=$perfil['usuario'];
      $ins="INSERT INTO archivos(archivo,clave,usuario) VALUES ('$archivo_t','$clave_t','$usuario_t')";
      $iniciar_ins=mysqli_query($con,$ins);
      move_uploaded_file($_FILES['archivo']['tmp_name'],'img/clases/temarios-archivos/'.$archivo_t);
      if ($iniciar_ins) {
          header("Location: ver_plan_profesor.php?clave=$clavee");
        }

    }

    if (isset($_POST['archivo_adicional'])) {
      $archivo_adi=$_FILES['archivo_adi']['name'];
      $nombre_adi=$_POST['nombre'];
      $clave_adi=$_SESSION['clave'];
      $usuario_adi=$perfil['usuario'];
      $ins_adi="INSERT INTO archivos_adicionales(archivo,nombre,clave,usuario) VALUES ('$archivo_adi','$nombre_adi','$clave_adi','$usuario_adi')";
      $iniciar_ins_adi=mysqli_query($con,$ins_adi);
      move_uploaded_file($_FILES['archivo_adi']['tmp_name'],'img/clases/temarios-archivos/'.$archivo_adi);
      if ($iniciar_ins_adi) {
          header("Location: ver_plan_profesor.php?clave=$clavee");
        }
    }

    if (isset($_POST['creartema'])) {
      $tema_clave=$_SESSION['clave'];
      $tema_usuario=$perfil['usuario'];
      $tema_imagen=$perfil['imagen'];
      $tema=$_POST['tema'];
      $tema_ins="INSERT INTO foro(clave,usuario,tema,imagen) VALUES ('$tema_clave','$tema_usuario','$tema','$tema_imagen')";
      $tema_query=mysqli_query($con,$tema_ins);
      if ($tema_query) {
        header("Location: ver_plan_profesor.php?clave=$clavee");
      }
    }

    if (isset($_POST['comen'])) {
      $comen_id=$_POST['id_tema'];
      $comen_clave=$_SESSION['clave'];
      $comen=$_POST['comentario'];
      $comen_usuario=$perfil['usuario'];
      $comen_ins="INSERT INTO comentario(id_tema,clave,comentario,usuario) VALUES ('$comen_id','$comen_clave','$comen','$comen_usuario')";
      $comen_query=mysqli_query($con,$comen_ins);
      if ($comen_query) {
        header("Location: ver_plan_profesor.php?clave=$clavee");
      }
    }

    if (isset($_GET['eliminar'])) {
        $eliminar=$_GET['eliminar'];
        $conseliminar="DELETE FROM plan_clase WHERE id_plan='$eliminar'";
        $inie=mysqli_query($con,$conseliminar);
        if ($inie) {
          header("Location: ver_plan_profesor.php?clave=$clavee");
        }
    }

        if (isset($_GET['delete_archivo'])) {
        $delete_archivo_d=$_GET['delete_archivo'];
        $delete_archivo_nombre_archivo=$_GET['nombre_archivo'];
        $cons_delete_archivo="DELETE FROM archivos_adicionales WHERE id_archivo='$delete_archivo_d'";
        $ini_delete_archivo=mysqli_query($con,$cons_delete_archivo);
        if ($ini_delete_archivo) {
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
    <title>Detalles Clase</title>

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
  <?php 
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
        <h2 class="center <?php echo $perfil['color'];?>-text"><?php echo $usu_cla;?></h2>
        <h4 class="<?php echo $perfil['color'];?>-text"><?php echo "$des_cla"; ?></h4>
      </div>
<?php } ?>

<?php  
$cons_count_miembros="SELECT * FROM mis_clases WHERE clave='$clavee'";
$query_count_miembros=mysqli_query($con,$cons_count_miembros);
$rows_miembros=mysqli_num_rows($query_count_miembros);
?>
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
  <div class="container">
    <div class="right-align"><h6 class="<?php echo $perfil['color']?>-text">Hay: <?php echo $rows_miembros;?> <?php if ($rows_miembros==1){ echo "Miembro Inscrito A Esta Clase"; } else{ echo "Miembros En Esta Clase"; } ?></h6></div>
    </div>
<?php
}

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
  <div class="center-align">
  <a href="miembros_profesor.php?clave=<?php echo $_SESSION['clave']; ?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light">Ver Todos...</a>
  </div>  
<br>

  <div class="fixed-action-btn horizontal click-to-toggle">
      <a class="btn-floating btn-large center <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons">mode_edit</i></a>
    <ul>
      <a class="btn-floating waves-effect waves-light center <?php echo $perfil['color'];?> " href="#modificar_actividad"><i class="material-icons">mode_edit</i></a>
    </ul>
  </div>

  <div id="ver" class="modal">
    <div class="container">
      <br><br>
      <div class="divider"></div>
        <br>
          <h2 class="center <?php echo $perfil['color'];?>-text">Actividades Entregadas:</h2>
      <div class="divider"></div>
      <br>
    </div>
    <br><br>
  </div>
  
    
    <div id="modificar_actividad" class="modal">
    <div class="container">
      <div class="row">
        <div class="col s12">
        <br><br>
        <div class="divider"></div>
        <br>
          <h2 class="center <?php echo $perfil['color'];?>-text">Modificar Actividades:</h2>
          <p class="center">Aqui podras seleccionar que actividad quieres modificar.</p>
               <div class="col s8">
               </div>
               <?php 
                  $pf=$perfil['usuario'];
                  $clve=$_SESSION['clave'];
                  $cons="SELECT * FROM plan_clase WHERE usuario='$pf' AND clave='$clve'";
                  $iniciar=mysqli_query($con,$cons);
                  $i=0;
                    while ($array=mysqli_fetch_array($iniciar)) {
                    $id=$array['id_plan'];
                    $t=$array['titulo'];
                    $i++;
                ?>
               <div class="center">
               <br>
               <div class="divider"></div>
                <h6 class="col s8"><?php echo $t;?></h6>
                <h6><a class="btn col s4 <?php echo $perfil['color'];?> waves-effect waves-light" href="action_editar_plan_clase_profesor.php?clave=<?php echo $id; ?>"><i class="material-icons right">mode_edit</i>Modificar</a></h6>
                <br>
                <div class="divider"></div>
                </div>
                <?php } ?>
        </div>
      </div>
    </div>
    <br><br>
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
            <td><a href="img/clases/temarios-archivos/<?php echo $array_t['archivo']?>" download="Temario <?php echo $clave_temario;?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons right">file_download</i>Descargar</a></td>
          </tr>
        </tbody>
      </table>
</div>

<?php }}else{  ?>

<div class="container">
  <h2>Subir Temario:</h2>
  <br>
  <h6 class="<?php echo $perfil['color'];?>-text"><i class="material-icons left">warning</i>AVISO: Una vez establecido el temario no podra eliminarlo ni modificarlo.</h6>
  <br>
  <form action="ver_plan_profesor.php" method="POST" enctype="multipart/form-data">
    <div class="file-field input-field">
      <div class="btn <?php echo $perfil['color']; ?> waves-effect waves-light">
        <span>Buscar</span>
        <input type="file" name="archivo" required="required">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path" type="text" required="required">
      </div>
    </div>
    <div class="container center">
    <input type="submit" value="Subir" name="temario" class="btn <?php echo $perfil['color']; ?> waves-effect waves-light">
    </div>
  </form>
</div>
<br>
<?php } ?>
<br>
<div class="container">
<h2 class="center <?php echo $perfil['color'];?>-text">Archivos Adicionales:</h2>
  <h2>Subir Archivo:</h2>
  <br>
  <form action="ver_plan_profesor.php" method="POST" enctype="multipart/form-data">
  <div class="input-field">
    <h6 class="<?php echo $perfil['color'];?>-text">Nombre:</h6>
    <input type="text" id="clave" name="nombre" required="required" autocomplete="off">
    </div>
    <div class="file-field input-field">
      <div class="btn <?php echo $perfil['color']; ?> waves-effect waves-light">
        <span>Buscar</span>
        <input type="file" name="archivo_adi" required="required">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path" type="text" required="required">
      </div>
    </div>
    <div class="container center">
    <input type="submit" value="Subir" name="archivo_adicional" class="btn <?php echo $perfil['color']; ?> waves-effect waves-light">
    </div>
  </form>
</div>
<br>
<?php  
$cons_count_archivosa="SELECT * FROM archivos_adicionales WHERE clave='$clavee'";
$query_count_archivosa=mysqli_query($con,$cons_count_archivosa);
$rows_archivosa=mysqli_num_rows($query_count_archivosa);
?>
<?php  
$clave_archivos=$_SESSION['clave'];
$cons_archivos="SELECT * FROM archivos_adicionales WHERE clave='$clave_archivos'";
$archivos_ini=mysqli_query($con,$cons_archivos);
$archivos_rows=mysqli_num_rows($archivos_ini);
  if ($archivos_rows>0) {
?>
<br>
<div class="container">
<div class="contar">
  <h6 class="right-align <?php echo $perfil['color'];?>-text">No. De Archivos: <?php echo $rows_archivosa;?></h6>
</div>
  <table class="highlight centered">
        <thead class="<?php echo $perfil['color']; ?>">
          <tr>
              <th class="white-text">Nombre</th>
              <th></th>
              <th></th>
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
    $id_archivo=$array_archivos['id_archivo'];
    $nombre_nombre_arhivo=$array_archivos['archivo'];
    $nombre_nombre_nombre_arhivo=$array_archivos['nombre'];
    $i++;
?>
<tr>
  <td><h5><?php echo $nombre_nombre_nombre_arhivo; ?></h5></td>
  <td><a href="img/clases/temarios-archivos/<?php echo $array_archivos['archivo']; ?>" target="_blank" class="btn <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons right">visibility</i>Ver</a></td>
  <td><a href="img/clases/temarios-archivos/<?php echo $array_archivos['archivo']; ?>" download="<?php echo $nombre_nombre_nombre_arhivo; ?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons right">file_download</i>Descargar</a></td>
  <td><a href="ver_plan_profesor.php?delete_archivo=<?php echo $id_archivo; ?>&nombre_archivo=<?php echo $nombre_nombre_arhivo; ?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light"><i class="material-icons right">delete</i>Eliminar</a></td>
</tr>  
<?php } ?>
</tbody>
      </table>
</div>
<br>
  <div class="container">
    <form action="ver_plan_profesor.php" method="POST" enctype="multipart/form-data">
    <h2>Crear Actividad:</h2>
    <br>
    <div class="row">
            <div class="input-field col s6">
              <h6 class="<?php echo $perfil['color'];?>-text">Titulo:</h6>
              <input type="text" id="titulo" name="titulo" required="required" autocomplete="off">
            </div>
            <div class="input-field col s6">
            <h6 class="<?php echo $perfil['color'];?>-text">Fecha de Entrega:</h6>
            <input type="date" name="fecha" required="required">
            </div>
            <div class="input-field col s12">
            <h6 class="<?php echo $perfil['color'];?>-text">Descripcion:</h6>
            <textarea id="texto" name="texto" class="materialize-textarea" required="required"></textarea>
            </div>
            <div class="container center">
            <input type="submit" class="btn <?php echo $perfil['color'];?> waves-effect waves-light" value="Crear" name="agregar">
            </div>
            </div>
          </form>
  </div>
  <br>
<?php  
  $cons_count_actividades="SELECT * FROM plan_clase WHERE clave='$clavee'";
  $query_count_actividades=mysqli_query($con,$cons_count_actividades);
  $rows_actividades=mysqli_num_rows($query_count_actividades);
?>
  <?php
      $clv=$_SESSION['clave'];
      $user=$perfil['usuario'];
      $i="<div class='container center'><h2 class='";
      $color=$perfil['color'].'-text';
      $f="'>Actividades:</h2></div>";
      $cs="SELECT * FROM plan_clase WHERE usuario='$user' AND clave='$clv'";
      $qeury=mysqli_query($con,$cs);
      $rows=mysqli_num_rows($qeury);
      if ($rows>0) {
          echo $i,$color,$f;
      ?>
<div class="container">
  <div class="contar">
    <h6 class="right-align <?php echo $perfil['color'];?>-text">No. De Actividades: <?php echo $rows_actividades;?></h6>
  </div> 
</div>
      <?php
       }else{
       } 
      ?>
      <?php 
      $profesor=$perfil['usuario'];
      $clave=$_SESSION['clave'];
      $cons="SELECT * FROM plan_clase WHERE usuario='$profesor' AND clave='$clave'";
      $iniciar=mysqli_query($con,$cons);
      $i=0;
        while ($array=mysqli_fetch_array($iniciar)) {
          $id=$array['id_plan'];
          $u=$array['usuario'];
          $c=$array['clave'];
          $t=$array['titulo'];
          $txt=$array['texto'];
          $f=$array['fecha'];
          $fe=$array['fecha_entrega'];
          $i++;
      ?>
<div class="container">
  <ul class="collapsible popout" data-collapsible="accordion">
    <li>
      <div class="collapsible-header <?php echo $perfil['color'];?> white-text"><i class="material-icons">note</i><?php echo $t; ?></div>
      <div class="collapsible-body">
      <h5 class="<?php echo $perfil['color'];?>-text "><?php echo $txt; ?></h5>
      <h6>Fecha de Entrega: <?php echo $fe; ?></h6>
      <div class="right-align">
      <h6><a class="btn col s6 <?php echo $perfil['color'];?> waves-effect waves-light" href="ver_plan_profesor.php?eliminar=<?php echo $id;?>"><i class="material-icons right">delete</i>Eliminar</a></h6>
        <a class="right-align btn <?php echo $perfil['color'];?> waves-effect waves-light" href="actividades_entregadas.php?id=<?php echo $id; ?>"><i class="material-icons right">visibility</i>Ver Actividades Entregadas</a>
      </div>
      </div>
    </li>
  </ul>
    </div>
      <?php } ?>
    <br>
    <div class="container">
    <h2 class="<?php echo $perfil['color'];?>-text center">Foro De Discusion:</h2>
    <br>
    <form action="ver_plan_profesor.php" method="POST">
    <h2>Crea Un Tema:</h2>
    <div class="row">
            <div class="input-field col s12">
            <h6 class="<?php echo $perfil['color'];?>-text">Tema:</h6>
            <textarea id="tema" name="tema" class="materialize-textarea" required="required"></textarea>
            </div>
            <div class="container center">
            <input type="submit" class="btn <?php echo $perfil['color'];?> waves-effect waves-light" value="Crear" name="creartema">
            </div>
            </div>
          </form>
    </div>
    <br>
<?php  
  $clave_foro=$_SESSION['clave'];
  $usuario_foro=$perfil['usuario'];
  $cons_foro="SELECT * FROM foro WHERE clave='$clave_foro' AND usuario='$usuario_foro'";
  $iniciar_foro=mysqli_query($con,$cons_foro);
  $rows_foro=mysqli_num_rows($iniciar_foro);
  if (!$rows_foro>0) {
?>
<?php 
  }
?> 

<?php 
  $consu_foro="SELECT * FROM foro WHERE clave='$clave_foro' AND usuario='$usuario_foro'";
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
                <br>
                <div class="right-align">
                  <a href="tema_profesor.php?id_tema=<?php echo $id_t;?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light">Ver Publicacion Completa.</a><br><br>
                  <a href="ver_plan_profesor.php?id_tema_e=<?php echo $id_t;?>" class="btn <?php echo $perfil['color'];?> waves-effect waves-light">Eliminar</a>
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