<?php
require "../Core/conexion.php";
require "../Model/dto/DetalleFacturaDto.php";
require "../Model/dao/DetalleFacturaDao.php";
require "../Controller/ClienteController.php";
require "../Controller/FacturaController.php";

if (isset($_POST["registrar"])) {
    registrar();
} else if (isset($_POST["modificar"])) {
    modificar();
} else if (isset($_GET["eliminar"])) {
    eliminar();
}

function registrar()
{
    $clienteDto = new ClienteDto();
    $clienteDto->setIdCliente($_POST["documento"]);
    $clienteDto->setNombre($_POST["nombre"]);
    $clienteDto->setApellido($_POST["apellido"]);
    $clienteDto->setCorreo($_POST["correo"]);
    $clienteDto->setTelefono($_POST["telefono"]);
    registrarCliente($clienteDto);

    $facturaDto = new FacturaDto();
    $facturaDto->setCliente($clienteDto);
    $fecha = (new DateTime())->format('Y-m-d H:i:s');
    $facturaDto->setFecha($fecha);
    $facturaDto->setDireccionEntrega($_POST["direccion"]);
    if (isset($_POST["metodoPago1"])) {
        $metodoPago = "Pago con tarjeta";
    } else if (isset($_POST["metodoPago2"])){
        $metodoPago = "Paypal";
    } else {
        $metodoPago = "Pago contraentrega";
    }
    $facturaDto->setMetodoPago($metodoPago);
    $facturaDto->setPrecioFinal($_POST["totalPrecio"]);
    $idFactura = registrarFactura($facturaDto);

    $totalDetalles = $_POST["totalDetalles"];

    $detalleFacturaDao = new DetalleFacturaDao();
    for ($i=1; $i <= $totalDetalles; $i++) {
        $detalleFacturaDto = new DetalleFacturaDto();
        $cantidad = $_POST["cantidad$i"];
        $detalleFacturaDto->setCantidad($cantidad);
        $precioTotal = $_POST["precioTotal$i"];
        $detalleFacturaDto->setPrecioTotal($precioTotal);
        $idProducto = $_POST["producto$i"];
        $detalleFacturaDto->SetProducto($idProducto);
        $detalleFacturaDto->SetFactura($idFactura);

        $detalleFacturaDao->registrar($detalleFacturaDto);
    }
   $msg = "Registro creado exitosamente";
    header("Location:../Views/index.php?msg=$msg");
}

/*function modificar()
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
}*/

function eliminar()
{
    $detalleFacturaDao = new DetalleFacturaDao();
    $msg = $detalleFacturaDao->eliminar($_GET["eliminar"]);
    header("Location:../index.php?msg=$msg");
}
