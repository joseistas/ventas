<?php

require 'template.php';
echo '<title>Modificar Producto</title>';
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb fs-5 justify-content-end ml-3">
        <li class="breadcrumb-item"><a href="admin.php"><i class="bi bi-house me-2"></i>Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modificar Producto</li>
    </ol>
</nav>
<div class="row mt-5">
    <div class="col-md-2"></div>
    <div class="col-md-8 bg-white shadow">
        <?php
        if (isset($_GET['mensaje'])) {
        ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-12 text-center">
                    <br><br>
                    <h4><b><?php echo $mensaje = $_GET['mensaje'] ?></b></h4>
                </div>
                <div class="col-md-1"></div>
            </div>
        <?php
        }
        ?>
        <?php
            

            if ($_GET['id'] != NULL) {
                $pDao = new ProductoDao();
                $productos = $pDao->obtenerProducto($_GET['id']);
            }
            ?> 
        <h3 class="text-center mt-4 mb-3">Modificar Producto</h3>
        <form action="../../Controller/ProductoController.php" method="POST">
        <div class="form-row">
                <div class="col-md-1"></div>
                <div class="col-md-10 form-group">
                    <label for="idProducto">Id Producto (*)</label>
                    <input type="number" id="idProducto" name="idProducto" class="form-control" value="<?php echo $productos['idProducto'] ?>" required>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="form-row">
                <div class="col-md-1"></div>
                <div class="col-md-10 form-group">
                    <label for="imagen">Imagen (*)</label>
                    <input type="file" id="imagen" name="imagen" class="form-control" value="<?php echo $productos['imagen'] ?>" required>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="form-row my-3">
                <div class="col-md-1"></div>
                <div class="col-md-10 form-group">
                    <label for="nombre">Nombre Producto (*)</label>
                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre Producto" value="<?php echo $productos['nombre'] ?>" required>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="form-row">
                <div class="col-md-1"></div>
                <div class="col-md-5 form-group">
                    <label for="precio">Precio (*)</label>
                    <input type="number" id="precio" name="precio" class="form-control" placeholder="Precio Unitario" value="<?php echo $productos['precio'] ?>" required>
                </div>
                <div class="col-md-5 form-group">
                    <label for="cantidad">Cantidad Disponible (*)</label>
                    <input id="cantidad" name="cantidad" type="number" class="form-control" placeholder="Cantidad disponible" value="<?php echo $productos['cantidad'] ?>" required>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="form-row my-3">
                <div class="col-md-1"></div>
                <div class="col-md-10 form-group">
                    <label for="descripcion">Descripción del Producto (*)</label>
                    <textarea id="descripcion" name="descripcion" type="text" class="form-control" placeholder="Descripción del Producto" value="<?php echo $usuarios['descripcion'] ?>" required>
                    </textarea>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="text-center my-4">
                <button type="submit" id="modificar" name="modificar" class="btn btn-primary w-50 py-2">Modificar</button>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<?php
require 'footer.php';
?>