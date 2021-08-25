<?php 
include('conexion.php');
$sesion=$_SESSION['profesor'];
$cons="SELECT * FROM usuarios WHERE correo='$sesion'";
$inicons=mysqli_query($con,$cons);
$perfil=mysqli_fetch_assoc($inicons);
?>