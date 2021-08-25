<?php 
session_start();
include('includes/exception_profesor.php');
include('includes/cons_profesor.php');
if (isset($_POST['crear'])) {
	include('conexion.php');
	$c=$_POST['clave'];
	$n=$_POST['nombre'];
	$u=$perfil['usuario'];
	$d=$_POST['descripcion'];
	$i=$_FILES['imagen']['name'];
	$consulta_clave="SELECT * FROM clases WHERE clave='$c'";
	$iniciar_clave=mysqli_query($con,$consulta_clave);
	$rows_clave=mysqli_num_rows($iniciar_clave);
	if ($rows_clave==1) {
		echo "Ya hay una clase con esa clave, intenta con otra.";
		echo "<br><a href='crear_clase_profesor.php'>Regresar</a>";
	}else{
		move_uploaded_file($_FILES['imagen']['tmp_name'],'img/clases/'.$i);
		$ins="INSERT INTO clases (clave,nombre_clase,usuario,descripcion,imagen) VALUES ('$c','$n','$u','$d','$i')";
		$resultado_insertar=mysqli_query($con,$ins);
		if ($resultado_insertar) {
			header('Location: clases_profesor.php?creada=1');
		}
	}
}

?>