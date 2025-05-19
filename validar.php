<?php
$control=$_POST['no_control'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['no_control']=$control;

//include ('db.php'); include php hace llamdo de lo que contiene, en este caso la llamada a xampp php

//Hacemos conexión con nuestra bd en xampp primero ponemos nombre de sevidor, nombre de mysql xampp
//despues contraseña de usuario xampp, y por últmimo el nombre de nuestra bd creada en xampp
$conexion=mysqli_connect("localhost","root","","login");

//hacemos una consulta con select*from en la tabla usuarios donde registros no_control y contraseña
//en nuestra bd
$consulta="SELECT*FROM usuarios where no_control='$control' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

//si es correcto nos dirige a la siguiente página
if($filas){
	header('location:dia_economico.html');
	header('location:horas_personales.html');
	header('location:comision_por_horas.html');
	header('location:oficio_de_comision.html');
	
//si no  es así nos dirige al mismo login para volver a introducir nuestras credenciales
}
else{
	?>
	<?php
	include("logueo.php");
	//die("conexion falllida: ".mysqli_connect_error());
	//echo "<script>alert('Error: usuario y/o clave incorrectos!!');</script>";

	?>
	<h1 class="bad">ERROR EN LA AUTENTIFICACIÓN</h1> 
	
 	<?php 

}
mysqli_free_result($resultado);
mysqli_close($conexion);
