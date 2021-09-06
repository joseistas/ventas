<?php
require "../Controller/ComprasController.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venta</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Wish shop project" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css" />
        <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="styles/categories.css" />
        <link rel="stylesheet" type="text/css" href="styles/categories_responsive.css" />
    </head>
    <body>
        <div class="super_container">
 
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
            <br />
            <!-- Products -->
            <div class="products">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Sidebar Left -->
                            <div class="sidebar_left clearfix">
                                <!-- Best Sellers -->
                                <div class="sidebar_section">
                                    <div class="sidebar_title">Productos</div>
                                    <div class="sidebar_section_content bestsellers_content">
                                        <ul>
                                            <!-- Best Seller Item -->
                                            <?php
                                            foreach ($listaProductoSel as $producto){
                                                $imagen=$producto["imagen"];
                                                $nombre=$producto["nombre"];
                                                $precio=$producto["precio"];
                                                $id=$producto["idProducto"];
                                                $cantidad = contarProductoSele($id);
                                            echo <<<EOT
                                                    <li class="clearfix">
                                                        <div class="best_image"><img src="images/$imagen" alt="" style=" width: 63px;"/></div>
                                                            <div class="best_content">
                                                                <div class="best_title"><a href="product.html">$nombre</a></div>
                                                                <div class="best_price">$precio</div>
                                                            </div>

                                                            <div class="best_buy">$cantidad</div>
                                                    </li>
                                                EOT;
                                            }
                                            ?>
                                            
                          
                                        </ul>
                                        
                                    </div>
                                    <a href="detalleVenta.php" class="clear_price_btn">Pagar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="styles/bootstrap4/popper.js"></script>
        <script src="styles/bootstrap4/bootstrap.min.js"></script>
        <script src="plugins/easing/easing.js"></script>
        <script src="plugins/parallax-js-master/parallax.min.js"></script>
        <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
        <script src="plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.js"></script>
        <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script src="js/categories_custom.js"></script>
    </body>
</html>
