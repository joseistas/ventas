<?php
require "../Controller/ComprasController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Tienda</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">
<?php
 print_r($listaProducto)
?>
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="#">Tienda CJ</a></div>
			<nav class="main_nav">
				<ul>
					<li><a href="#">Inicio</a></li>
					<li><a href="#vestidos">Vestidos</a></li>
					
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
									<div class="cart_num">
										<?php
										echo count( $_SESSION['productos']);
										
										?>
									</div>
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
	<!-- Home -->

	<div class="home">
		
		<!-- Home Slider -->

		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/slider3.jpg)"></div>
					<div class="home_slider_content">
							
							</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/slider2.jpg)"></div>
					<div class="home_slider_content">
							
					</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/extra_1.jpg)"></div>
					<div class="home_slider_content">
							
					</div>
				</div>

			</div>
			
			<!-- Home Slider Nav -->

			<div class="home_slider_next d-flex flex-column align-items-center justify-content-center"><img src="images/arrow_r.png" alt=""></div>

		</div>
	</div>



	<div class="arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle" id="vestidos">Vestidos</div>
						<div class="section_title">Nueva colección</div>
					</div>
				</div>
			</div>
			
			<div class="row products_container">

				<!-- Product -->
				<?php
				foreach ($listaProducto as $producto){
					$imagen=$producto["imagen"];
					$nombre=$producto["nombre"];
					$precio=$producto["precio"];
					$id=$producto["idProducto"];
				echo <<<EOT
				<div class="col-lg-4 product_col">
					<div class="product">
						<div class="product_image"><img src="images/$imagen" alt=""></div>
							<div class="product_content clearfix">	
								<div class="product_info">
									<div class="product_name"><a href="product.html">$nombre</a></div>
									<div class="product_price">$precio</div>
								</div>
								<div class="product_options">
									<div class="product_buy product_option"><img src="images/shopping-bag-white.svg" alt=""></div>
									<div class="product_fav product_option product_select" data-producto="$id">+</div>
								</div>
							</div>
						</div>
					</div>
			
				EOT;
				?>
				<?php
				}
				?>
			>
		</div>
	</div>


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

<form id="compra" action="index.php" method="POST">
	<input id="evento" name="evento" type="hidden" value="">
	<input id= "idProducto" name="idProducto" type="hidden" value="">
</form>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="js/custom.js"></script>
<script>
$( ".product_select" ).click(function() {
	let id = $(this).data("producto");
	$("#idProducto").val(id);
	$("#evento").val("evento");
	$("#compra").submit();
});
</script>
</body>
</html>