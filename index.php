<?php
	session_start();

	require_once "clases/Conexion.class.php";
	require_once "clases/Login.class.php";

	if (isset($_POST['email']) && isset($_POST['password'])):

		$email    = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
		$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_MAGIC_QUOTES);

		$l = new Login;
		$l->setEmail($email);
		$l->setPassword($password);
		
		if($l->logar()):
			header("Location: dashboard");
		else:
			$error = "Error de Autentificacion";
		endif;
	endif;

	if(isset($_SESSION['login'])):
		header("Location: dashboard");
	else:
?>

<!DOCTYPE html>
	<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login-oop-php</title>
	<meta name="author" content="Rafael Chirel">
	<meta name="description" content="login-poo">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="plugin/bootstrap-3.3.7/css/bootstrap.min.css">
</head>

<body>
	<div class="login-form">
		<div id="login">
			<form action="" method="post">
		        <h2 class="text-center">Login</h2>    
		        <p class="text-center"><?php echo isset($error) ? $error : ''; ?></p>   
		        <div class="form-group">
		            <input type="email" name="email" class="form-control" placeholder="Email" required="required">
		        </div>
		        <div class="form-group">
		            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
		        </div>
		        <div class="form-group">
		            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
		        </div>
		    </form>
		</div>
	</div>

	<script src="plugin/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>                                		                            

<?php endif; ?>
