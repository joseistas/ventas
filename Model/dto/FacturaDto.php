<?php
class FacturaDto
{
    private $idFactura;
    private ClienteDto $cliente;
    private $fecha;
    private $direccionEntrega;
    private $metodoPago;
    private $precioFinal;

    function getIdFactura()
    {
        return $this->idFactura;
    }

    function setIdFactura($idFactura)
    {
        $this->idFactura = $idFactura;
    }

    function getCliente()
    {
        return $this->cliente;
    }

    function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function getDireccionEntrega()
    {
        return $this->direccionEntrega;
    }

    function setDireccionEntrega($direccionEntrega)
    {
        $this->direccionEntrega = $direccionEntrega;
    }

    function getMetodoPago()
    {
        return $this->metodoPago;
    }

    function setMetodoPago($metodoPago)
    {
        $this->metodoPago = $metodoPago;
    }

    function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }
}
