<?php
class DetalleFacturaDto
{
    private $idDetalleFactura;
    private $cantidad;
    private $precioTotal;
    private $producto;
    private $factura;

    function getIdDetalleFactura()
    {
        return $this->idDetalleFactura;
    }

    function setIdDetalleFactura($idDetalleFactura)
    {
        $this->idDetalleFactura = $idDetalleFactura;
    }

    function getCantidad()
    {
        return $this->cantidad;
    }

    function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    function getPrecioTotal()
    {
        return $this->precioTotal;
    }

    function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;
    }

    function getProducto()
    {
        return $this->producto;
    }

    function setProducto($producto)
    {
        $this->producto = $producto;
    }

    function getFactura()
    {
        return $this->factura;
    }

    function setFactura($factura)
    {
        $this->factura = $factura;
    }
}
