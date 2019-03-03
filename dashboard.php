<?php
	session_start();

	require_once "clases/Conexion.class.php";
	require_once "clases/Login.class.php";

	if(isset($_GET['logout'])):
		Login::deslogar();
	endif; 
?>

<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login-oop-php</title>
		<meta name="author" content="Rafael Chirel">
		<meta name="description" content="login-poo">
		<link rel="stylesheet" type="text/css" href="plugin/bootstrap-3.3.7/css/bootstrap.min.css">
		<?php
			if (isset($_SESSION['login'])):
				?>
				<link rel="stylesheet" type="text/css" href="css/dashboard.css">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<?php
			endif;
		?>
	</head>
	<body>
	
		<?php
			if(isset($_SESSION['login'])):
				?>
					<div class="card">
					  <img src="https://www.eldiario.es/fotos/Elliot-Alderson-protagonista-Mr-Robot_EDIIMA20160928_0101_19.jpg" alt="John" style="width:100%">
					  <h1> <?php echo $_SESSION['name']; ?> </h1>
					  <p class="title">CEO & Founder</p>
					  <p>fsociety</p>
					  <div style="margin: 24px 0;">
					    <a href="#"><i class="fa fa-dribbble"></i></a> 
					    <a href="#"><i class="fa fa-twitter"></i></a>  
					    <a href="#"><i class="fa fa-linkedin"></i></a>  
					    <a href="#"><i class="fa fa-facebook"></i></a> 
					 </div>
					 <p><button onclick="window.location.href='/login-oop-php/dashboard?logout=true'">Cerrar Sesion</button></p>
					</div>
				<?php
			else:
				?>
					<div class="bg-danger text-center col-xs-6 col-xs-offset-3">
						<b>¡Acceso Denegado!</b><br>
						<a href="/login-oop-php/dashboard?logout=true" title="">LOGIN</a>
					</div>
				 <?php
			endif;
		?>

	<script src="plugin/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

	</body>
</html>
