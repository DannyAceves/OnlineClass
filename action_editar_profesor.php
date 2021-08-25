<?php  
session_start();
include('includes/exception_profesor.php');
include('includes/cons_profesor.php');

include('conexion.php');
if (isset($_POST['edi'])) {
  $u=$_POST['usuario'];
  $i=$_FILES['imagen']['name'];
  $user=$perfil['usuario'];
  if (!empty($u) && !empty($i)) {
    $editarus="UPDATE usuarios SET usuario='$u' WHERE correo='$sesion'";
    $clasesus="UPDATE clases SET usuario='$u' WHERE usuario='$user'";
    $planus="UPDATE plan_clase SET usuario='$u' WHERE usuario='$user'";
    $forous="UPDATE foro SET usuario='$u' WHERE usuario='$user'";
    $comenus="UPDATE comentario SET usuario='$u' WHERE usuario='$user'";
    $aaus="UPDATE archivos_adicionales SET usuario='$u' WHERE usuario='$user'";
    $aus="UPDATE archivos SET usuario='$u' WHERE usuario='$user'";
    $us=mysqli_query($con,$editarus);
    $cls=mysqli_query($con,$clasesus);
    $plans=mysqli_query($con,$planus);
    $foros=mysqli_query($con,$forous);
    $comens=mysqli_query($con,$comenus);
    $aas=mysqli_query($con,$aaus);
    $as=mysqli_query($con,$aus);

    $editarim="UPDATE usuarios SET imagen='$i' WHERE correo='$sesion'";
    $editarim_comen="UPDATE comentario SET imagen='$i' WHERE usuario='$user'";
    $editarim_foro="UPDATE foro SET imagen='$i' WHERE usuario='$user'";
    $im=mysqli_query($con,$editarim);
    $im_comen=mysqli_query($con,$editarim_comen);
    $im_foro=mysqli_query($con,$editarim_foro);
    move_uploaded_file($_FILES['imagen']['tmp_name'],'img/usuarios/'.$i);

    header('Location: perfil_profesor.php?correcto=1');
  }else if(!empty($u) && empty($i)){
    $editarus="UPDATE usuarios SET usuario='$u' WHERE correo='$sesion'";
    $clasesus="UPDATE clases SET usuario='$u' WHERE usuario='$user'";
    $planus="UPDATE plan_clase SET usuario='$u' WHERE usuario='$user'";
    $forous="UPDATE foro SET usuario='$u' WHERE usuario='$user'";
    $comenus="UPDATE comentario SET usuario='$u' WHERE usuario='$user'";
    $aaus="UPDATE archivos_adicionales SET usuario='$u' WHERE usuario='$user'";
    $aus="UPDATE archivos SET usuario='$u' WHERE usuario='$user'";
    $us=mysqli_query($con,$editarus);
    $cls=mysqli_query($con,$clasesus);
    $plans=mysqli_query($con,$planus);
    $foros=mysqli_query($con,$forous);
    $comens=mysqli_query($con,$comenus);
    $aas=mysqli_query($con,$aaus);
    $as=mysqli_query($con,$aus);

    header('Location: perfil_profesor.php?correcto=1');
  }else if(empty($u) && !empty($i)){
    $editarim="UPDATE usuarios SET imagen='$i' WHERE correo='$sesion'";
    $editarim_comen="UPDATE comentario SET imagen='$i' WHERE usuario='$user'";
    $editarim_foro="UPDATE foro SET imagen='$i' WHERE usuario='$user'";
    $im=mysqli_query($con,$editarim);
    $im_comen=mysqli_query($con,$editarim_comen);
    $im_foro=mysqli_query($con,$editarim_foro);
    move_uploaded_file($_FILES['imagen']['tmp_name'],'img/usuarios/'.$i);

    header('Location: perfil_profesor.php?correcto=1');
  }else{
    header('Location: perfil_profesor.php?vacio=1');
  }
}

?>