<?php
include('conexion.php');
include('includes/exception_sesion_iniciada.php');
		
	if (isset($_POST['ini'])) {
		$correo=$_POST["correo"];
		$contrasena=md5($_POST["contrasena"]);
		$a="SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena' AND tipo='Alumno'";
		$p="SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena' AND tipo='Profesor'";
		$a_query=mysqli_query($con,$a);
		$p_query=mysqli_query($con,$p);
		$count_a=mysqli_num_rows($a_query);
		$count_p=mysqli_num_rows($p_query);

		if ($count_a==1) {
			session_start();
			$_SESSION['alumno']=$correo;
			header('Location: inicio_alumno.php');
		}elseif ($count_p==1) {
			session_start();
			$_SESSION['profesor']=$correo;
			header('Location: inicio_profesor.php');
		}else{
			header("Location: iniciar_sesion.php?no_inicio=1");
		}
	}

?>