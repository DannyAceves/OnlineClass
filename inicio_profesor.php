<?php  
session_start();
include('includes/exception_profesor.php');
include('includes/cons_profesor.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="icon" href="img/logo/Online-Class-Color-Logo.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Inicio Perfil</title>
    <style>
      .tabs {
  position: relative;
  overflow-x: auto;
  overflow-y: hidden;
  height: 48px;
  width: 100%;
  background-color: #fff;
  margin: 0 auto;
  white-space: nowrap;
}

.tabs.tabs-transparent {
  background-color: transparent;
}

.tabs.tabs-transparent .tab a,
.tabs.tabs-transparent .tab.disabled a,
.tabs.tabs-transparent .tab.disabled a:hover {
  color: rgba(255, 255, 255, 0.7);
}

.tabs.tabs-transparent .tab a:hover,
.tabs.tabs-transparent .tab a.active {
  color: #fff;
}

.tabs.tabs-transparent .indicator {
  background-color: #fff;
}

.tabs.tabs-fixed-width {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
}

.tabs.tabs-fixed-width .tab {
  -webkit-flex-grow: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}

.tabs .tab {
  display: inline-block;
  text-align: center;
  line-height: 48px;
  height: 48px;
  padding: 0;
  margin: 0;
  text-transform: uppercase;
}

.tabs .tab a {
  color: white;
  display: block;
  width: 100%;
  height: 100%;
  padding: 0 24px;
  font-size: 14px;
  text-overflow: ellipsis;
  overflow: hidden;
  transition: color .28s ease;
}

.tabs .tab a:hover, .tabs .tab a.active {
  background-color: transparent;
  color: white;
}

.tabs .tab.disabled a,
.tabs .tab.disabled a:hover {
  color: white;
  cursor: default;
}

.tabs .indicator {
  position: absolute;
  bottom: 0;
  height: 2px;
  background-color: white;
  will-change: left, right;
}

@media only screen and (max-width: 992px) {
  .tabs {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
  }
  .tabs .tab {
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
  }
  .tabs .tab a {
    padding: 0 12px;
  }
}

.portada{
  width: 100%;
}

    </style>
</head>
  <body>
    <!--Scripts-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
      $(".button-collapse").sideNav();
    </script>
    <script>
        $(document).ready(function(){
    $('ul.tabs').tabs();
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
    <a class="btn-floating btn-large transparent z-depth-0">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red transparent z-depth-0"><i class="material-icons">insert_chart</i></a></li>
    </ul>
  </div>

<?php
      include('conexion.php'); 
      $perfil_usuario=$perfil['usuario'];
      $cons_count="SELECT * FROM clases WHERE usuario='$perfil_usuario'";
      $query=mysqli_query($con,$cons_count);
      $count=mysqli_num_rows($query);
      $cons_count_dos="SELECT * FROM plan_clase WHERE usuario='$perfil_usuario'";
      $query_dos=mysqli_query($con,$cons_count_dos);
      $count_dos=mysqli_num_rows($query_dos);
?>

  <div class="container">
  <h2 class="<?php echo $perfil['color'];?>-text center">Inicio</h2>
  <div class="center">
    <img src="img/usuarios/<?php echo $perfil['imagen'];?>" class="circle" alt="" style="width: 250px;height: 250px;">
  </div>
  <br>
  <h2 class="<?php echo $perfil['color'];?>-text center">Datos Generales:</h2>
  <ul class="collapsible popout" data-collapsible="accordion">
    <li>
      <div class="collapsible-header <?php echo $perfil['color'];?> white-text"><i class="material-icons">info</i>Nombre De Usuario:</div>
      <div class="collapsible-body"><span><h5><?php echo $perfil['usuario']; ?></h5></span></div>
    </li>
    <li>
      <div class="collapsible-header <?php echo $perfil['color'];?> white-text"><i class="material-icons">info</i>Nombre Completo:</div>
      <div class="collapsible-body"><span><h5><?php echo $perfil['nombre'].' '.$perfil['apellidos'] ; ?></h5></span></div>
    </li>
    <li>
      <div class="collapsible-header <?php echo $perfil['color'];?> white-text"><i class="material-icons">info</i>Correo:</div>
      <div class="collapsible-body"><span><h5><?php echo $perfil['correo']; ?></h5></span></div>
    </li>
    <li>
      <div class="collapsible-header <?php echo $perfil['color'];?> white-text"><i class="material-icons">info</i>Tipo De Usuario:</div>
      <div class="collapsible-body"><span><h5><?php echo $perfil['tipo']; ?></h5></span></div>
    </li>
    <li>
      <div class="collapsible-header <?php echo $perfil['color'];?> white-text"><i class="material-icons">info</i>Clases:</div>
      <div class="collapsible-body"><span><h5>Impartes Un Total De: <?php echo $count;?> Clases</h5></span></div>
    </li>
    <li>
      <div class="collapsible-header <?php echo $perfil['color'];?> white-text"><i class="material-icons">info</i>Actividades:</div>
      <div class="collapsible-body"><span><h5>Tienes Un Total De: <?php echo $count_dos;?> Actividades Solicitadas</h5></span></div>
    </li>
  </ul>    
  </div>

  <br><br>

  </body>
</html>


