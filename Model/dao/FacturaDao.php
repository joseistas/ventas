<?php
class FacturaDao
{
    private $mensaje;

    function consultarId($idFactura)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("SELECT * FROM factura WHERE idFactura = ?");
            $query->bindParam(1, $idFactura);
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
            $query = $cnn->prepare("SELECT * FROM factura");
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function eliminar($idFactura)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("DELETE FROM factura WHERE idFactura = ?");
            $query->bindParam(1, $idFactura);
            $query->execute();
            $mensaje = "Registro eliminado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function registrar(FacturaDto $facturaDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("INSERT INTO factura VALUES (NULL, ?, ?, ?, ?, ?)");
            $query->bindParam(1, $facturaDto->getCliente()->getIdCliente());
            $query->bindParam(2, $facturaDto->getFecha());
            $query->bindParam(3, $facturaDto->getDireccionEntrega());
            $query->bindParam(4, $facturaDto->getMetodoPago());
            $query->bindParam(5, $facturaDto->getPrecioFinal());
            $query->execute();
            $mensaje = "Registro creado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function modificar(FacturaDto $facturaDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("UPDATE factura SET idCliente = ?, fecha = ?, direccionEntrega = ?, metodoPago = ?, precioFinal = ? WHERE idFactura = ?");
            $query->bindParam(1, $facturaDto->getCliente()->getIdCliente());
            $query->bindParam(2, $facturaDto->getFecha());
            $query->bindParam(3, $facturaDto->getDireccionEntrega());
            $query->bindParam(4, $facturaDto->getMetodoPago());
            $query->bindParam(5, $facturaDto->getPrecioFinal());
            $query->bindParam(6, $facturaDto->getIdFactura());
            $query->execute();
            $mensaje = "Registro modificado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }
}
