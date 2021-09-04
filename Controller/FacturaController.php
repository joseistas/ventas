<?php
require "../Core/conexion.php";
require "../Model/dto/FacturaDto.php";
require "../Model/dao/FacturaDao.php";

if (isset($_POST["registrar"])) {
    registrar($clienteDto);
} else if (isset($_POST["modificar"])) {
    modificar($clienteDto);
} else if (isset($_GET["eliminar"])) {
    eliminar();
}

function registrar(ClienteDto $clienteDto)
{
    $facturaDto = new FacturaDto();
    $facturaDao = new FacturaDao();

    $facturaDto->setIdFactura($_POST["idFactura"]);
    $facturaDto->setCliente($clienteDto);
    $facturaDto->setFecha($_POST["fecha"]);
    $facturaDto->setDireccionEntrega($_POST["direccionEntrega"]);
    $facturaDto->setMetodoPago($_POST["metodoPago"]);
    $facturaDto->setPrecioFinal($_POST["precioFinal"]);

    $msg = $facturaDao->registrar($facturaDto);
    header("Location:../index.php?msg=$msg");
}

function modificar(ClienteDto $clienteDto)
{
    $facturaDto = new FacturaDto();
    $facturaDao = new FacturaDao();

    $facturaDto->setIdFactura($_POST["idFactura"]);
    $facturaDto->setCliente($clienteDto);
    $facturaDto->setFecha($_POST["fecha"]);
    $facturaDto->setDireccionEntrega($_POST["direccionEntrega"]);
    $facturaDto->setMetodoPago($_POST["metodoPago"]);
    $facturaDto->setPrecioFinal($_POST["precioFinal"]);
    
    $msg = $facturaDao->modificar($facturaDto);
    header("Location:../index.php?msg=$msg");
}

function eliminar()
{
    $facturaDao = new FacturaDao();
    $msg = $facturaDao->eliminar($_GET["eliminar"]);
    header("Location:../index.php?msg=$msg");
}
