<?php
require "../Core/conexion.php";
require "../Model/dto/ProductoDto.php";
require "../Model/dao/ProductoDao.php";

if (isset($_POST["registrar"])) {
    registrar();
} else if (isset($_POST["modificar"])) {
    modificar();
} else if (isset($_POST["eliminar"])) {
    eliminar();
}

function registrar(UsuarioDto $usuarioDto)
{
    $productoDto = new ProductoDto();
    $productoDao = new ProductoDao();
    $productoDto->setImagen($_POST["imagen"]);
    $productoDto->setNombre($_POST["nombre"]);
    $productoDto->setDescripcion($_POST["descripcion"]);
    $productoDto->setCantidad($_POST["cantidad"]);
    $productoDto->setPrecio($_POST["precio"]);
    $productoDto->setIdUsuarioCreacion($usuarioDto);
    $msg = $productoDao->registrar($productoDto);
    header("Location:../index.php?msg=$msg");
}

function modificar(UsuarioDto $usuarioDto)
{
    $productoDto = new ProductoDto();
    $productoDao = new ProductoDao();
    $productoDto->setIdProducto($_POST["idProducto"]);
    $productoDto->setImagen($_POST["imagen"]);
    $productoDto->setNombre($_POST["nombre"]);
    $productoDto->setDescripcion($_POST["descripcion"]);
    $productoDto->setCantidad($_POST["cantidad"]);
    $productoDto->setPrecio($_POST["precio"]);
    $productoDto->setIdUsuarioCreacion($usuarioDto);
    $msg = $productoDao->modificar($productoDto);
    header("Location:../index.php?msg=$msg");
}

function eliminar()
{
    $productoDao = new ProductoDao();
    $msg = $productoDao->eliminar($_GET["eliminar"]);
    header("Location:../index.php?msg=$msg");
}
?>