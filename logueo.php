<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Iniciar Sesión</title>
	<!--link se enlaza a otra carpeta en este caso a master -->
	<link rel="stylesheet" href="css/master.css">


    <link rel="shortcut icon" href="./images/faviconitsz.png" type="image/x-icon">


    
</head>
<body>

<!--div class es un contenedor que almacena el logo, el usuario y contraseña -->
<div class="caja-login">

	<!--class se utiliza para declarar una variable
	scr se utiliza para darle una ruta de la carpeta que contiene las imagenes
	alt es para un texto alternativo en caso que no cargue la imagen -->
	<img class="avatar" src="./images/login_logo.png" alt="Logo login">

	<!-- Con esta parte de código nos hara conexion con la bd de xampp para validar al usuario-->
	<form action="validar.php" method="post">

	<!--h1 es para el titulo -->
	<h1>Iniciar Sesión</h1>

	<form method="POST" >
		<!-- Nombre de Usuario-->
		<label for="username">Número de control</label>
		<!--placeholder introduce un texto dentro del recuadro-->

		 <input type="text" placeholder="No_control" name="no_control"> 
		<!-- <p> <input type="text" placeholder="Ingrese su nombre" name="usuario"></p> -->

		<!-- --Contraseña-->

		<label for="password">Contraseña</label>
		<div class="form-row">
		<div class="col">
	<input class="form-control" type="password" placeholder="Contraseña" name="contraseña" id="password">
	    </div>


	 


<div class="col">
<button  class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
</div>
</div>
				
				<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
		
		<!-- <p> <input type="password" placeholder="Ingrese contraseña" name="contraseña"></p> -->

		<!--submit es para boton enviar y value es para poner texto -->
		<!-- <a href="dia_economico.html"> -->
       
       <br>


        <input type="submit" value="Ingresar" >
    
		
		<!--href es un link 
			br es para dar un salto de linea-->
		<a href="#"> Recuperar contraseña</a><br>
		<a href="#">¿No tienes una cuenta?</a>

	</form>
</div>

</body>
</html>