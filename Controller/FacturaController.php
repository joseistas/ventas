<?php
require "../Model/dto/FacturaDto.php";
require "../Model/dao/FacturaDao.php";

function registrarFactura(FacturaDto $facturaDto)
{
    $facturaDao = new FacturaDao();
    $id = $facturaDao->registrar($facturaDto);
    return $id;
    //header("Location:../index.php?msg=$msg");
}

function modificarFactura(FacturaDto $facturaDto)
{
    $facturaDao = new FacturaDao();
    $msg = $facturaDao->modificar($facturaDto);
    header("Location:../index.php?msg=$msg");
}

function eliminarFactura()
{
    $facturaDao = new FacturaDao();
    $msg = $facturaDao->eliminar($_GET["eliminar"]);
    header("Location:../index.php?msg=$msg");
}
