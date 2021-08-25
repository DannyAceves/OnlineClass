<?php  
	if (isset($_SESSION['profesor'])) {
		header('Location: inicio_profesor.php');
	}else if(isset($_SESSION['alumno'])){
		header('Location: inicio_alumno.php');
	}
?>