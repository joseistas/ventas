<?php
class DetalleFacturaDao
{
    private $mensaje;

    function consultarId($idDetalleFactura)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("SELECT * FROM detalleFactura WHERE idDetalleFactura = ?");
            $query->bindParam(1, $idDetalleFactura);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function consultarTodos()
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("SELECT * FROM detalleFactura");
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function eliminar($idDetalleFactura)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("DELETE FROM detalleFactura WHERE idDetalleFactura = ?");
            $query->bindParam(1, $idDetalleFactura);
            $query->execute();
            $mensaje = "Registro eliminado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function registrar(DetalleFacturaDto $detalleFacturaDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("INSERT INTO detalleFactura VALUES (NULL, ?, ?, ?, ?)");
            $query->bindParam(1, $detalleFacturaDto->getIdDetalleFactura());
            $query->bindParam(2, $detalleFacturaDto->getCantidad());
            $query->bindParam(3, $detalleFacturaDto->getPrecioTotal());
            $query->bindParam(4, $detalleFacturaDto->getProducto()->getIdProducto());
            $query->bindParam(5, $detalleFacturaDto->getFactura()->getIdFactura());
            $query->execute();
            $mensaje = "Registro creado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function modificar(DetalleFacturaDto $detalleFacturaDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("UPDATE detalleFactura SET cantidad = ?, precioTotal = ?, idProducto = ?, idFactura = ? WHERE idDetalleFactura = ?");
            $query->bindParam(1, $detalleFacturaDto->getCantidad());
            $query->bindParam(2, $detalleFacturaDto->getPrecioTotal());
            $query->bindParam(3, $detalleFacturaDto->getProducto()->getIdProducto());
            $query->bindParam(4, $detalleFacturaDto->getFactura()->getIdFactura());
            $query->bindParam(5, $detalleFacturaDto->getIdDetalleFactura());
            $query->execute();
            $mensaje = "Registro modificado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }
}
