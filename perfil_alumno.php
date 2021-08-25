<?php  
session_start();
include('includes/exception_alumno.php');
include('includes/cons_alumno.php');

include('conexion.php');
if (isset($_POST['edi'])) {
  $i=$_FILES['imagen']['name'];
  $user=$perfil['usuario'];
  if(!empty($i)){
    $editarim="UPDATE usuarios SET imagen='$i' WHERE correo='$sesion'";
    $editarim_comen="UPDATE comentario SET imagen='$i' WHERE usuario='$user'";
    $im=mysqli_query($con,$editarim);
    $im_comen=mysqli_query($con,$editarim_comen);
    move_uploaded_file($_FILES['imagen']['tmp_name'],'img/usuarios/'.$i);
    header('Location: perfil_alumno.php?correcto=1');
  }else{
    header('Location: perfil_alumno.php?vacio=1');
  }
}

if (isset($_POST['por'])) {
  $i_p=$_FILES['imagen_portada']['name'];
    if (!empty($i_p)) {
      move_uploaded_file($_FILES['imagen_portada']['tmp_name'],'img/portadas/'.$i_p);
      $edi_por="UPDATE usuarios SET imagen_portada='$i_p' WHERE correo='$sesion'";
      $ini_por=mysqli_query($con,$edi_por);
      header('Location: perfil_alumno.php?correcto=1');
    }else{
      header('Location: perfil_alumno.php?vacio=1');
    } 
  }

if (isset($_POST['colr'])) {
  $clr=$_POST['color'];
    if (!empty($clr)) {
      $edi_clr="UPDATE usuarios SET color='$clr' WHERE correo='$sesion'";
      $ini_clr=mysqli_query($con,$edi_clr);
      header('Location: perfil_alumno.php?correcto=1');
    }else{
      header('Location: perfil_alumno.php?vacio=1');
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
    .parallax-container{
      height: 630px;
    }
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

        .toast{
      background-color: 
      <?php  
        if (isset($_GET['correcto'])) {
          echo "#4CAF50";
        }elseif (isset($_GET['vacio'])) {
          echo "#F44336";
        }
      ?>;
    }
  </style>
    <title>Perfil</title>
</head>
  <body>
  <!--Scripts-->
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script>
      $(document).ready(function(){
        $('.parallax').parallax();
      });
  </script>
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

  <div class="fixed-action-btn horizontal click-to-toggle">
      <a class="btn-floating btn-large waves-effect waves-light center <?php echo $perfil['color'];?> "><i class="material-icons">create</i></a>
    <ul>
      <li><a class="btn-floating waves-effect waves-light center <?php echo $perfil['color'];?> " href="#editar-color"><i class="material-icons">palette</i></a></li>
      <li><a class="btn-floating waves-effect waves-light center <?php echo $perfil['color'];?> " href="#editar-portada"><i class="material-icons">landscape</i></a></li>
      <li><a class="btn-floating waves-effect waves-light center <?php echo $perfil['color'];?> " href="#editar-foto"><i class="material-icons">image</i></a></li>
      <li><a class="btn-floating waves-effect waves-light center <?php echo $perfil['color'];?> " href="#editar_perfil"><i class="material-icons">account_circle</i></a></li>
    </ul>
  </div>

  <?php  
  if (isset($_GET['correcto'])) {
  ?>
    <script>Materialize.toast('Perfil Actualizado.', 4000)</script>
  <?php
  }elseif (isset($_GET['vacio'])) {
  ?>
    <script>Materialize.toast('Perfil Sin Actualizar.', 4000)</script>
  <?php
  }
  ?>
  <div id="editar_perfil" class="modal">
    <div class="container">
      <div class="row">
        <div class="col s12">
        <br><br>
        <div class="divider"></div>
        <br>
          <h2 class="center <?php echo $perfil['color'];?>-text">Editar Perfil:</h2>
          <div class="divider"></div>
          <div class="container">
           <p class="center">Podras cambiar cuantas veces quieras tu imagen de portada, perfil asi como el nombre de tu usuario.</p>
         </div>
          <form action="action_editar_alumno.php" method="POST" enctype="multipart/form-data">
            <div class="input-field col s12">
              <h6 class="<?php echo $perfil['color'];?>-text">Usuario:</h6>
              <input type="text" id="usuario" name="usuario" value="<?php echo $perfil['usuario'];?>" required="required" autocomplete="off">
            </div>
            <div class="file-field input-field col s12">
            <h6 class="<?php echo $perfil['color'];?>-text">Foto de Perfil:</h6>
              <div class="btn waves-effect waves-light <?php echo $perfil['color'];?> ">
                <span><i class="material-icons">search</i></span>
                <input type="file" name="imagen" required="required">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path" type="text" required="required">
              </div>
            </div>
            <div class="container center">
            <input type="submit" class="btn waves-effect waves-light <?php echo $perfil['color'];?> " value="Editar" name="edi">
            </div>
            <br><br>
          </form>
        </div>
      </div>
    </div>
  </div>


         <div id="editar-foto" class="modal">
         <div class="container">
          <br><br>
        <div class="divider"></div>
        <br>
         <h2 class="<?php echo $perfil['color'];?>-text center">Foto de Perfil:</h2>
         <div class="divider"></div>
         <div class="container">
           <p class="center">Selecciona tu foto de perfil para que asi los usuarios puedan reconocerte de inmediato.</p>
         </div>
         <br>
          <form action="perfil_alumno.php" method="POST" enctype="multipart/form-data">
            <div class="file-field input-field">
              <div class="btn waves-effect waves-light <?php echo $perfil['color'];?> ">
                <span><i class="material-icons">search</i></span>
                  <input type="file" name="imagen" required="required">
              </div>
                  <div class="file-path-wrapper">
                    <input class="file-path" type="text" required="required">
                  </div>
            </div>
            <div class="container center">
              <input type="submit" class="btn waves-effect waves-light <?php echo $perfil['color'];?> " name="edi" value="Subir">
            </div>
            <br><br>
          </form>
         </div>
       </div>


       <div id="editar-portada" class="modal">
         <div class="container">
         <br><br>
         <div class="divider"></div>
         <br>
         <h2 class="<?php echo $perfil['color'];?>-text center">Foto de Portada:</h2>
         <div class="divider"></div>
         <div class="container">
           <p class="center">Selecciona una imagen con la que te indentifiques y cambia el aspecto de tu perfil.</p>
           <p class="center">Podras seleccionar cualquier imagen.</p>
         </div>
         <br>
          <form action="perfil_alumno.php" method="POST" enctype="multipart/form-data">
            <div class="file-field input-field">
              <div class="btn waves-effect waves-light <?php echo $perfil['color'];?> ">
                <span><i class="material-icons">search</i></span>
                  <input type="file" name="imagen_portada" required="required">
              </div>
                  <div class="file-path-wrapper">
                    <input class="file-path" type="text" required="required">
                  </div>
            </div>
            <p class="col s6 <?php echo $perfil['color'];?>-text ">ARCHIVO MENOR A 5MB.</p>
            <div class="container center">
              <input type="submit" class="btn waves-effect waves-light <?php echo $perfil['color'];?> " name="por" value="Subir">
            </div>
            <br><br>
          </form>
         </div>
       </div>

       <div id="editar-color" class="modal">
         <div class="container">
         <br><br>
         <div class="divider"></div>
         <br>
         <h2 class="<?php echo $perfil['color'];?>-text center">Color de Enfasis:</h2>
         <div class="divider"></div>
         <div class="container">
         <p class="center">Podras personalizar el color de enfasis de tu perfil escogiendo entre mas de 10 colores colores diferentes que podras escojer.</p>
         <p class="center">Este color se le asignara a cada elemento posible dentro de tu perfil.</p>
         <br>
         <h3 class="<?php echo $perfil['color'];?>-text center">Paleta de Colores:</h3>
         <br>
         <div class="container">  
            <form action="perfil_alumno.php" method="POST">
              <p>
                  <div class="row"> 
                      <div class="red col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="red" value="red">
                      <label for="red" class="red-text col s4">Red</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="pink col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="pink" value="pink">
                      <label for="pink" class="pink-text col s4">Pink</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="purple col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="purple" value="purple">
                      <label for="purple" class="purple-text col s4">Purple</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="deep-purple col s2" style="width: 25px;height: 25px;"></div><input class=" col s2" name="color" type="radio" id="deep-purple" value="deep-purple">
                      <label for="deep-purple" class="deep-purple-text col s8">Deep-Purple</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="indigo col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="indigo" value="indigo">
                      <label for="indigo" class="indigo-text col s4">Indigo</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="blue col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="blue" value="blue">
                      <label for="blue" class="blue-text col s4">Blue</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="light-blue col s2" style="width: 25px;height: 25px;"></div><input class=" col s2" name="color" type="radio" id="light-blue" value="light-blue">
                      <label for="light-blue" class="light-blue-text col s8">Light-Blue</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="cyan col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="cyan" value="cyan">
                      <label for="cyan" class="cyan-text col s4">Cyan</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="teal col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="teal" value="teal">
                      <label for="teal" class="teal-text col s4">Teal</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="green col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="green" value="green">
                      <label for="green" class="green-text col s4">Green</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="light-green col s2" style="width: 25px;height: 25px;"></div><input class=" col s2" name="color" type="radio" id="light-green" value="light-green">
                      <label for="light-green" class="light-green-text col s8">Light-Green</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="amber col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="amber" value="amber">
                      <label for="amber" class="amber-text col s4">Amber</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="orange col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="orange" value="orange">
                      <label for="orange" class="orange-text col s4">Orange</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="deep-orange col s2" style="width: 25px;height: 25px;"></div><input class=" col s2" name="color" type="radio" id="deep-orange" value="deep-orange">
                      <label for="deep-orange" class="deep-orange-text col s8">Deep-Orange</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="brown col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="brown" value="brown">
                      <label for="brown" class="brown-text col s4">Brown</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="grey col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="grey" value="grey">
                      <label for="grey" class="grey-text col s4">Grey</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="blue-grey col s2" style="width: 25px;height: 25px;"></div><input class=" col s2" name="color" type="radio" id="blue-grey" value="blue-grey">
                      <label for="blue-grey" class="blue-grey-text col s8">Blue-Grey</label>
                  </div>
              </p>
              <p>
                  <div class="row"> 
                      <div class="black col s4" style="width: 25px;height: 25px;"></div><input class=" col s4" name="color" type="radio" id="black" value="black">
                      <label for="black" class="black-text col s4">Black</label>
                  </div>
              </p>
              <br>
              <div class="container center">
                <input type="submit" class="btn waves-effect waves-light <?php echo $perfil['color'];?> " name="colr" value="Establecer Color">
              </div>
              <br><br>
            </form>
         </div>

          </div>
         </div>
       </div>


  <div class="parallax-container">
    <div class="parallax"><img src="img/portadas/<?php 
    if (empty($perfil['imagen_portada'])) {
      echo "default.jpg";
    }else{
      echo $perfil['imagen_portada'];
    } 
    ?>" class="responsive-img"></div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
      <img src="img/usuarios/<?php echo $perfil['imagen']; ?>" class="circle materialboxed" alt="" width="250px" height="250px">
       
    </div>
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

<div class="container center">
      <br>
      <div class="divider"></div>
      <h2><?php echo $perfil['usuario']; ?></h2>
      <div class="divider"></div>
      <h4 class="<?php echo $perfil['color'];?>-text ">Datos Del Usuario:</h4>
      <h5><?php echo $perfil['nombre'].' '.$perfil['apellidos']; ?></h5>
      <h5><?php echo $perfil['correo']; ?></h5>
      <h4 class="<?php echo $perfil['color'];?>-text ">Tipo De Usuario:</h4>
      <h5><?php echo $perfil['tipo']; ?></h5>
</div>
<br>

</body>
</html>


           