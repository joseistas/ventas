<?php

require "../Model/dto/ProductoDto.php";
require "../Model/dao/ProductoDao.php";
require "../Core/conexion.php";

if (isset($_POST["registro"])) {
    registrar();
} else if (isset($_POST["modificar"])) {
    modificar();
} else if (isset($_POST["eliminar"])) {
    eliminar();
}

function registrar()
{
    $productoDto = new ProductoDto();
    $productoDao = new ProductoDao(); 
    $productoDto->setImagen($_POST["imagen"]);
    $productoDto->setNombre($_POST["nombre"]);
    $productoDto->setDescripcion($_POST["descripcion"]);
    $productoDto->setCantidad($_POST["cantidad"]);
    $productoDto->setPrecio($_POST["precio"]);
    $productoDto->setIdUsuarioCreacion($_POST['idUsuarioCreacion']);
    $mensaje = $productoDao->registrar($productoDto);
    header("Location:../Views/Portal/admin.php?mensaje=".$mensaje);
}

function modificar()
{
    $productoDto = new ProductoDto();
    $productoDao = new ProductoDao();
    $productoDto->setIdProducto($_POST["idProducto"]);
    $productoDto->setImagen($_POST["imagen"]);
    $productoDto->setNombre($_POST["nombre"]);
    $productoDto->setDescripcion($_POST["descripcion"]);
    $productoDto->setCantidad($_POST["cantidad"]);
    $productoDto->setPrecio($_POST["precio"]);
    $productoDto->setIdUsuarioCreacion($_POST['idUsuarioCreacion']);
    $msg = $productoDao->modificar($productoDto);
    header("Location:../Views/Portal/admin.php?mensaje=".$msg);
}

function eliminar()
{
    $productoDao = new ProductoDao();
    $msg = $productoDao->eliminar($_GET["eliminar"]);
    header("Location:../admin.php?msg=$msg");
}
?>