<?php  
	if (isset($_SESSION['profesor'])) {
	}else if(isset($_SESSION['alumno'])){
		header('Location: inicio_alumno.php');
	}else{
		header('Location: iniciar_sesion.php');
	}
?>