<?php  
	if (isset($_SESSION['alumno'])) {
	}else if(isset($_SESSION['profesor'])){
		header('Location: inicio_profesor.php');
	}else{
		header('Location: iniciar_sesion.php');
	}
?>