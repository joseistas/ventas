<?php
require "../Controller/ComprasController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="#">Tienda CJ</a></div>
			<nav class="main_nav">
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="index.php#vestidos">Vestidos</a></li>
				</ul>
			</nav>
			<div class="header_content ml-auto">
			
				<div class="shopping">
					<!-- Cart -->
					<a href="productos.php">
						<div class="cart">
							<img src="images/shopping-bag.svg" alt="">
							<div class="cart_num_container">
								<div class="cart_num_inner">
									<div class="cart_num">1</div>
								</div>
							</div>
						</div>
					</a>
				
				</div>
			</div>
			<nav class="main_nav">
				<ul>
					<li><a href="#">Inicio Sesión</a></li>
					
					
				</ul>
			</nav>
			
		</div>
	</header>
<br>
<br>

	<!-- Checkout -->

	<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Details -->
				<div class="col-lg-6">
					<div class="billing">
						<div class="checkout_title">Información cliente</div>
						<div class="checkout_form_container">
							<form action="#" id="checkout_form">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-between">
									<input type="text" class="checkout_input checkout_input_50" placeholder="Nombres " required="required">
									<input type="text" class="checkout_input checkout_input_50" placeholder="Apellidos" required="required">
								</div>
								<input type="email" class="checkout_input" placeholder="Correo Electronico" required="required">
								
								<input type="text" class="checkout_input" placeholder="Dirección entrega" required="required">
								<textarea name="checkout_comment" id="checkout_comment" class="checkout_comment" placeholder="Leave a comment about your order"></textarea>
								<div class="billing_options">
									<div class="billing_account">
										<input type="checkbox" id="checkbox_account" name="regular_checkbox" class="regular_checkbox checkbox_account">
										<label for="checkbox_account"><img src="images/checked.png" alt=""></label>
										<span>Create an account</span>
									</div>
									<div class="billing_shipping">
										<input type="checkbox" id="checkbox_shipping" name="regular_checkbox" class="regular_checkbox checkbox_shipping">
										<label for="checkbox_shipping"><img src="images/checked.png" alt=""></label>
										<span>Ship to a different address</span>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Cart Details -->
				<div class="col-lg-6">
					<div class="cart_details">
						<div class="checkout_title">Total</div>
						<div class="cart_total">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Producto</div>
									<div class="cart_total_price ml-auto">Total</div>
								</li>
								<?php
								$totalPrecio = 0;
								foreach ($listaProductoSel as $producto){
									
									$nombre=$producto["nombre"];
									$precio=$producto["precio"];
									$id=$producto["idProducto"];
									$cantidad = contarProductoSele($id);
									$valor = $precio*$cantidad;
									$totalPrecio += $valor;

									echo <<<EOT
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">$nombre x $cantidad</div>
										<div class="cart_total_price ml-auto">$ $precio</div>
									</li>
									EOT;
								}
								?>
								<li class="d-flex flex-row align-items-start justify-content-start total_row">
									<div class="cart_total_title">Total</div>
									<div class="cart_total_price ml-auto" >$<?php echo  $totalPrecio ?></div>
								</li>
							</ul>
						</div>
						<div class="payment_options">
							<div>
								<input type="radio" id="radio_payment_1" name="regular_radio" class="regular_radio">
								<label for="radio_payment_1">cash on delivery</label>
							</div>
							<div>
								<input type="radio" id="radio_payment_2" name="regular_radio" class="regular_radio" checked>
								<label for="radio_payment_2">paypal</label>
								<div class="visa payment_option"><a href="#"><img src="images/visa.jpg" alt=""></a></div>
								<div class="master payment_option"><a href="#"><img src="images/master.jpg" alt=""></a></div>
							</div>
							<button class="cart_total_button">place order</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->


	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="footer_logo"><a href="index.php">Tienda CJ</a></div>
					<nav class="footer_nav">
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="#vestidos">Vestidos</a></li>
						</ul>
					</nav>
					<div class="footer_social">
						<ul>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						</ul>
					</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout_custom.js"></script>
</body>
</html>