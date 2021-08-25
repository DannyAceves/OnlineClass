<?php  
session_start();
include('includes/exception_alumno.php');
include('includes/cons_alumno.php');
include('conexion.php');

if (isset($_POST['edi'])) {
  $user=$perfil['usuario'];  
  $u=$_POST['usuario'];
  $i=$_FILES['imagen']['name'];

  if (!empty($u) && !empty($i)) {
    $editarus="UPDATE usuarios SET usuario='$u' WHERE correo='$sesion'";
    $editarus_mc="UPDATE mis_clases SET usuario='$u' WHERE correo_iden='$sesion'";
    $editarus_comen="UPDATE comentario SET usuario='$u' WHERE usuario='$user'";
    $editarus_act="UPDATE actividades SET usuario='$u' WHERE usuario='$user'";
    $us=mysqli_query($con,$editarus);
    $us_mc=mysqli_query($con,$editarus_mc);
    $us_comen=mysqli_query($con,$editarus_comen);
    $us_act=mysqli_query($con,$editarus_act);

    
    $editarim="UPDATE usuarios SET imagen='$i' WHERE correo='$sesion'";
    $editarim_comen="UPDATE comentario SET imagen='$i' WHERE usuario='$user'";
    $im=mysqli_query($con,$editarim);
    $im_comen=mysqli_query($con,$editarim_comen);
    move_uploaded_file($_FILES['imagen']['tmp_name'],'img/usuarios/'.$i);
    
    header('Location: perfil_alumno.php?correcto=1');
  }else if(!empty($u) && empty($i)){ 
    $editarus="UPDATE usuarios SET usuario='$u' WHERE correo='$sesion'";
    $editarus_mc="UPDATE mis_clases SET usuario='$u' WHERE correo_iden='$sesion'";
    $editarus_comen="UPDATE comentario SET usuario='$u' WHERE usuario='$user'";
    $editarus_act="UPDATE actividades SET usuario='$u' WHERE usuario='$user'";
    $us=mysqli_query($con,$editarus);
    $us_mc=mysqli_query($con,$editarus_mc);
    $us_comen=mysqli_query($con,$editarus_comen);
    $us_act=mysqli_query($con,$editarus_act);

    header('Location: perfil_alumno.php?correcto=1');
  }else if(empty($u) && !empty($i)){
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

?>