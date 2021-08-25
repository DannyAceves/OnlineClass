<?php
include('conexion.php');
if (isset($_POST['reg'])) {
	$u=$_POST['usuario'];
	$n=$_POST['nombre'];
	$a=$_POST['apellidos'];
	$cor=$_POST['correo'];
	$c=md5($_POST['contrasena']);
	$t=$_POST['tipo'];
	$i=$_FILES['imagen']['name'];
	$consu="SELECT * FROM usuarios WHERE usuario='$u'";
	$consc="SELECT * FROM usuarios WHERE correo='$cor'";
	$uini=mysqli_query($con,$consu);
	$cini=mysqli_query($con,$consc);
	$rowsu=mysqli_num_rows($uini);
	$rowsc=mysqli_num_rows($cini);

	if ($rowsu==1 AND $rowsc==1) {
		header("Location: registrar_sesion.php?correoyusuario=1");
	}else if ($rowsu==1) {
		header("Location: registrar_sesion.php?usuario=1"); 
	}else if($rowsc==1){
		header("Location: registrar_sesion.php?correo=1");
	}else{
		$ins="INSERT INTO usuarios (usuario,nombre,apellidos,correo,contrasena,tipo,imagen) VALUES ('$u','$n','$a','$cor','$c','$t','$i')";
		move_uploaded_file($_FILES['imagen']['tmp_name'],'img/usuarios/'.$i);
		$res=mysqli_query($con,$ins);
		
		if ($res) {
			header("Location: iniciar_sesion.php?registro=si");
		}
	}
}

?>