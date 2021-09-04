<?php
require "../Core/conexion.php";
require "../Model/dto/DetalleFacturaDto.php";
require "../Model/dao/DetalleFacturaDao.php";

if (isset($_POST["registrar"])) {
    registrar();
} else if (isset($_POST["modificar"])) {
    modificar();
} else if (isset($_GET["eliminar"])) {
    eliminar();
}

function registrar(FacturaDto $facturaDto, ProductoDto $productoDto)
{
    $detalleFacturaDto = new DetalleFacturaDto();
    $detalleFacturaDao = new DetalleFacturaDao();

    $detalleFacturaDto->setIdDetalleFactura($_POST["idDetalleFactura"]);
    $detalleFacturaDto->setCantidad($_POST["cantidad"]);
    $precioTotal = $detalleFacturaDto->getCantidad() * $productoDto->getPrecio();
    $detalleFacturaDto->setPrecioTotal($precioTotal);
    $detalleFacturaDto->SetProducto($productoDto->getIdProducto());
    $detalleFacturaDto->SetFactura($facturaDto->getIdFactura());

    $msg = $detalleFacturaDao->registrar($detalleFacturaDto);
    header("Location:../index.php?msg=$msg");
}

function modificar(FacturaDto $facturaDto, ProductoDto $productoDto)
{
    $detalleFacturaDto = new DetalleFacturaDto();
    $detalleFacturaDao = new DetalleFacturaDao();

    $detalleFacturaDto->setIdDetalleFactura($_POST["idDetalleFactura"]);
    $detalleFacturaDto->setCantidad($_POST["cantidad"]);
    $precioTotal = $detalleFacturaDto->getCantidad() * $productoDto->getPrecio();
    $detalleFacturaDto->setPrecioTotal($precioTotal);
    $detalleFacturaDto->SetProducto($productoDto->getIdProducto());
    $detalleFacturaDto->SetFactura($facturaDto->getIdFactura());

    $msg = $detalleFacturaDao->modificar($detalleFacturaDto);
    header("Location:../index.php?msg=$msg");
}

function eliminar()
{
    $detalleFacturaDao = new DetalleFacturaDao();
    $msg = $detalleFacturaDao->eliminar($_GET["eliminar"]);
    header("Location:../index.php?msg=$msg");
}
