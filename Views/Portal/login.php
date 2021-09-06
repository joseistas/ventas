<?php 
 session_start();
 if (isset($_SESSION['nombre'])){
	 header('Location:index.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inicio Sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../plugins/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../pluginsvendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../pluginsvendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../pluginsvendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../pluginsvendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../styles/main.css">
	<link rel="stylesheet" type="text/css" href="../styles/util.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<form class="login100-form validate-form" method="POST" action="LoginProceso.php">
					<span class="login100-form-title p-b-43">
						Inicio Sesión 
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Usuario requerido">
						<input class="input100" type="text" name="usuario">
						<span class="focus-input100"></span>
						<span class="label-input100">Usuario</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Contraseña requerida">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Contraseña</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
					
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="background-color: #937C6F;">
							Ingresar
						</button>
					</div>
					
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							<a href="../index.php">Tienda CJ</a>
						</span>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('../images/imgLogin.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="../js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../styles/bootstrap4/popper.js"></script>
	<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>