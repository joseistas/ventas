<?php
require 'template.php';
echo '<title>Administrador</title>';
?>

<div class="row">
    <div class="col-md-12 text-center">
        <h3 class="ms-4">Bienvenid@</h3>
        <a href="registrarProducto.php" class="btn btn-primary my-3 w-25">Registrar Producto</a>
    </div>
</div>
<hr>

<div class="container-fluid">
    <table class="table table-bordered table-hover display" style="width:100%" style="border: 2px solid black;">
        <thead>
            <tr>
                <th>Id Producto</th>
                <th>Imágen</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
                <?php
                require '../../Model/dao/ProductoDao.php';
                require '../../Model/dto/ProductoDto.php';
                require '../../Core/conexion.php';
                $pDao = new ProductoDao();
                $productos = $pDao->obtenerTodos();
                foreach ($productos as $producto) { ?>
            <tr>
                <td> <?php echo $producto['idProducto']; ?> </td>
                <td> <?php echo $producto['imagen']; ?> </td>
                <td> <?php echo $producto['nombre']; ?> </td>
                <td> <?php echo $producto['descripcion']; ?> </td>
                <td> <?php echo $producto['cantidad']; ?> </td>
                <td> <?php echo $producto['precio']; ?> </td>
                <td style="width: 5%;"> <a name="idProducto" id="idProducto" href="modificarProducto.php?id=<?php echo $producto['idProducto']; ?>"> </a> </td>
            </tr>
        <?php
                }
        ?>
        </tr>
        </tbody>
    </table>
</div>